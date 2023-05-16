<?php
include_once "../connect.php";

$query = "
    SELECT idx, date_format(create_at, \"%m-%d %H:00\") as checkpoint,
        (max(data3)-ifnull(LAG(max(data3)) OVER (ORDER BY create_at, idx), 0))*10 as 1dong
    FROM water.raw_data
    WHERE board_number=3
	    AND create_at between '2023-5-13' and '2023-5-17'
    group by checkpoint
    ORDER BY idx DESC;";

$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$power_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {

    array_push($power_arr, array($k, floor($v['data3'])));
    array_push($create_at_arr, array($k, $v['DATE']));
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
