<?php
include_once "../connect.php";

$query = "
    SELECT 
        DATE_FORMAT(created_at, \"%m-%d %H:00\") as DF,
        (MAX(data1) - ifnull(LAG(MAX(data1)) over(order by created_at),data1)) as 'hour_5building'
    
    FROM upa.raw_data
    
    WHERE address = '2300' and board_number= '4' and
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
    array_push($time_in_arr, array($k, $v['hour_5building']));
    array_push($create_at_arr, array($k, substr($v['DF'],5,11)));
}

$time_in = array(
    'data' => $time_in_arr,
    'color'=>'#9d00ff',
);

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('time_in'=>$time_in, );
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
