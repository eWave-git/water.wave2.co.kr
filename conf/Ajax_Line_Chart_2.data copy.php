<?php
include_once "../connect.php";

$query = "
    SELECT 
        DATE_FORMAT(created_at, \"%m-%d %H:00\") as DF,
        (MAX(IF(board_number=17, data1, NULL)) - MIN(IF(board_number=17, data1, NULL)) ) as hour_1building
    FROM upa.raw_data
    where created_at < now() and created_at > current_date() - interval 1 day  and address = '2300'
    group by DF
    order by idx asc;
    "; 


$result = mysqli_query($conn, $query);
$rows = array();

while($row = mysqli_fetch_array($result))
    $rows[] = $row;



$time_in_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($time_in_arr, array($k, $v['hour_1building']));
    array_push($create_at_arr, array($k, substr($v['DF'],5,11)));
}

$time_in = array(
    'data' => $time_in_arr,
    'color'=>'#ff0000',
);


$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('time_in'=>$time_in, );
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
