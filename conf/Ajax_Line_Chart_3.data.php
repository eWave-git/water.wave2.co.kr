<?php
include_once "../connect.php";

$query = "
    SELECT idx, created_at, date_format(created_at, \"%m-%d\") as DF,
        (MAX(IF(board_number=18, data1, NULL)) - MIN(IF(board_number=18, data1, NULL)) ) as daily_2building
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

$daily_2building_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($daily_2building_arr, array($k, ($v['daily_2building'])));
    array_push($create_at_arr, array($k, substr($v['DF'],0,5)));
}


$daily_2building = array(
    'data' => $daily_2building_arr,
    'color'=>'#ff6600',
);


//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('daily_2building'=>$daily_2building,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
