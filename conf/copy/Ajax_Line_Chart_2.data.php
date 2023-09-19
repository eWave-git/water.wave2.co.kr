<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, 
        DATE_FORMAT(create_at, \"%m-%d %H:00\") as DF,
        (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as hour_1building
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


// $i =0;
// while($row = mysqli_fetch_array($result)) {
//     if ($i > 0) {
//         $rows[] = $row;
//     }
//     $i++;
// }

$pressure_in_arr = array();
$pressure_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($pressure_in_arr, array($k, $v['hour_1building']));
//    array_push($pressure_out_arr, array($k, $v['hour_2building']));
    array_push($create_at_arr, array($k, substr($v['DF'],5,11)));
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
