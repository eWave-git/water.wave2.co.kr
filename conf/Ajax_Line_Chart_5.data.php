<?php
include_once "../connect.php";

$query = "
    SELECT idx, created_at, date_format(created_at, \"%m-%d\") as DF,
    (MAX(IF(board_number=19, data1, NULL)) - MIN(IF(board_number=19, data1, NULL)) ) as daily_3building
    FROM upa.raw_data
    WHERE created_at >= \"2024-1-5\" and created_at < now() and address = '2300'
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

$daily_3building_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($daily_3building_arr, array($k, ($v['daily_3building'])));
    array_push($create_at_arr, array($k, substr($v['DF'],0,5)));
}

$daily_3building = array(
    'data' => $daily_3building_arr,
    'color'=>'#00ff3b',
);

//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array( 'daily_3building'=>$daily_3building,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
