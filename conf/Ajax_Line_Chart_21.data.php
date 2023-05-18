<?php
include_once "../connect.php";

$query = "
    SELECT idx, date_format(create_at, \"%m-%d %H:00\") as checkpoint,
        (max(data3)-ifnull(LAG(max(data3)) OVER (ORDER BY create_at, idx), 0))*10 as 1dong
    FROM water.raw_data
    WHERE board_number=3
        AND create_at >= now() - INTERVAL 24 hour
    group by checkpoint
    ORDER BY idx asc;
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
    array_push($throughput_arr, array($k, $v['1dong']));
    //array_push($throughput_arr, array($k, floor($v['data3'])));
    array_push($create_at_arr, array($k, substr($v['checkpoint'],5,3)));
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
