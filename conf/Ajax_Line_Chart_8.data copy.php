<?php
include_once "../connect.php";

$query = "
    SELECT 
        DATE_FORMAT(created_at, \"%m-%d %H:00\") as DF,
        (MAX(data1) - ifnull(LAG(MAX(data1)) over(order by created_at),data1)) as 'hour_4building'
    
    FROM upa.raw_data
    
    WHERE address = '2300' and board_number= '3' and
        created_at < now() and created_at > current_date() - interval 1 day 
    
    GROUP BY DAY(created_at),FLOOR(HOUR(created_at))
    
    ORDER BY idx asc;
    "; 


$result = mysqli_query($conn, $query);
$rows = array();

while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$time_in_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($throughput_arr, array($k, $v['hour_4building']));

    array_push($create_at_arr, array($k, substr($v['DF'],5,11)));
}

$throughput = array(
    'data' => $throughput_arr,
    'color'=>'#0004ff',
);

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('throughput'=>$throughput,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>