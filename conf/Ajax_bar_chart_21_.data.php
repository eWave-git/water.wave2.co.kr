<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, 
    DATE_FORMAT(create_at, \"%m-%d\") as DF,
    ( MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as room_1
    FROM water.raw_data
    where create_at > \"2023-05-13\" and create_at < current_date()
    group by DF;"
    ;

$result = mysqli_query($conn, $query);
$rows = array();
$i =0;

while($row = mysqli_fetch_array($result))
    $rows[] = $row;

/* while($row = mysqli_fetch_array($result)) {
    if ($i > 0) {
        $rows[] = $row;
    }
    $i++;
} */

$watertank_arr = array();

$create_at_arr = array();

foreach ($rows as $k => $v) {

    array_push($watertank_arr, array($k, $v['room_1']));
    array_push($create_at_arr, array($k, substr($v['DF'],0,5)));
}

    



$watertank = array(
    'data' => $watertank_arr,
    'bars' => array('show'=>true,),
);


//echo "<xmp>";
//print_r($watertank);
//echo "</xmp>";


$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('watertank'=>$watertank,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>