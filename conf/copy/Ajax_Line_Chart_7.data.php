<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
        (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as daily_1building,
        (MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10 as daily_2building,
        (MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10 as daily_3building
    FROM water.raw_data
    WHERE create_at >= \"2023-05-13\" and create_at < current_date()
    group by DF
    ORDER BY idx asc;
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

$daily_1building_arr = array();
$daily_2building_arr = array();
$daily_3building_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($daily_1building_arr, array($k, ($v['daily_1building'])));
    array_push($daily_2building_arr, array($k, ($v['daily_2building'])));
    array_push($daily_3building_arr, array($k, ($v['daily_3building'])));
    array_push($create_at_arr, array($k, substr($v['DF'],1,5)));
}

$daily_1building = array(
    'data' => $daily_1building_arr,
    'color'=>'#ff0000',
);

$daily_2building = array(
    'data' => $daily_2building_arr,
    'color'=>'#000000',
);

$daily_3building = array(
    'data' => $daily_3building_arr,
    'color'=>'#00ff00',
);

//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('daily_1building'=>$daily_1building, 'daily_2building'=>$daily_2building, 'daily_3building'=>$daily_3building,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
