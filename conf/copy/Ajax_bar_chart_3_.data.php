<?php
include_once "../connect.php";

$query = "
select idx, create_at, date_format(create_at, \"%m-%d %H:00\") as checkpoint,
    (max(data3)-ifnull(LAG(max(data3)) OVER (ORDER BY create_at, idx), 0))*10 as 1dong
FROM water.raw_data
WHERE board_number=3
    AND create_at >= now() - INTERVAL 25 hour
group by checkpoint
ORDER BY idx asc;";

$result = mysqli_query($conn, $query);
$rows = array();
$i =0;
while($row = mysqli_fetch_array($result)) {
    if ($i > 0) {
        $rows[] = $row;
    }
    $i++;
}


$power_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {

    array_push($power_arr, array($k, $v['1dong']));
    array_push($create_at_arr, array($k, substr($v['checkpoint'],6,5)));
}

$power = array(
    'data' => $power_arr,
    'bars' => array('show'=>true,),
);


//echo "<xmp>";
//print_r($power);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('power'=>$power,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
