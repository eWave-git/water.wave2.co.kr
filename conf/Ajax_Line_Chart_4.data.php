<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, 
	    DATE_FORMAT(create_at, \"%m-%d %H:00\") as DF,
	    (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as room_1,
        SUM((MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10) OVER(order by create_at) AS sum_room_1
    FROM water.raw_data
    where create_at < current_date() and create_at > current_date() - interval 1 day
    group by DF
    order by idx asc;

    "; 
//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();

while($row = mysqli_fetch_array($result))
    $rows[] = $row;
/*    
$i =0;
while($row = mysqli_fetch_array($result)) {
    if ($i > 0) {
        $rows[] = $row;
    }
    $i++;
}
*/

$throughput_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($throughput_arr, array($k, $v['sum_room_1']));
    //array_push($throughput_arr, array($k, floor($v['data3'])));
    array_push($create_at_arr, array($k, substr($v['DF'],5,3)));
}

$throughput = array(
    'data' => $throughput_arr,
    'color'=>'#3c8dbc',
);


//echo "<xmp>";
//print_r($throughput);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('throughput'=>$throughput,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
