<?php
include_once "../connect.php";

$query = "
           select 
                CDATA.DF2 as h_time,
                avg(CDATA.room_1) as h_room_1,
                COUNT(CDATA.room_1) as good
            from
                (SELECT 
                DATE_FORMAT(create_at, \"%m-%d %H:00\") as DF1,
                    DATE_FORMAT(create_at, \"%H:00\") as DF2,
                (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as room_1
                FROM water.raw_data 
                where create_at >\"2023-05-13\" and create_at < current_date()
                group by DF1
                order by idx asc
                ) CDATA
            group by h_time;
    ";

$query2 = "
            SELECT 
	            DATE_FORMAT(create_at, \"%H:00\") as DF,
	            (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as room_1_1
            FROM water.raw_data
            where create_at > current_date()
            group by DF;
    ";

//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();

while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$result2 = mysqli_query($conn, $query2);
$rows2 = array();

while($row2 = mysqli_fetch_array($result2))
    $rows2[] = $row2;

$pressure_in_arr = array();
$pressure_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($pressure_in_arr, array($k, $v['h_room_1']));
//    array_push($pressure_in_arr, array($k, floor($v['data2'])));
//    array_push($pressure_out_arr, array($k, $v['good']));
    array_push($create_at_arr, array($k, substr($v['h_time'],0,4)));
}

$pressure_in = array(
    'data' => $pressure_in_arr,
    'color'=>'#3c8dbc',
);

$pressure_out = array(
    'data' => $pressure_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($pressure_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('pressure_in'=>$pressure_in, 'pressure_out'=>$pressure_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
