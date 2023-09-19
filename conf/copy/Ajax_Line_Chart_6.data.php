<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, 
        DATE_FORMAT(create_at, \"%m-%d %H:00\") as DF,
        (MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10 as hour_3building
    FROM water.raw_data
    where create_at < current_date() and create_at > current_date() - interval 1 day
    group by DF
    order by idx asc;
    "; 

$result = mysqli_query($conn, $query);
$rows = array();

while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$throughput_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($throughput_arr, array($k, $v['hour_3building']));

    array_push($create_at_arr, array($k, substr($v['DF'],5,11)));
}

$throughput = array(
    'data' => $throughput_arr,
    'color'=>'#3c8dbc',
);

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('throughput'=>$throughput,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
