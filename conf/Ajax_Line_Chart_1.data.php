<?php
include_once "../connect.php";

$query = "
SELECT idx, created_at, date_format(created_at, \"%m-%d\") as DF,
    (MAX(IF(board_number=17, data1, NULL)) - MIN(IF(board_number=17, data1, NULL)) ) as daily_1building
FROM upa.raw_data
WHERE address = '2300' and created_at >= now() - interval 7 day
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

$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($daily_1building_arr, array($k, ($v['daily_1building'])));
    array_push($create_at_arr, array($k, substr($v['DF'],0,5)));
}

$daily_1building = array(
    'data' => $daily_1building_arr,
    'color'=>'#ff0000',
);

//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('daily_1building'=>$daily_1building,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>

<!-- WHERE address = '2300' and created_at >= \"2024-2-25\" and created_at < now() -->