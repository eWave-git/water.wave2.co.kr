<?php
include_once "../connect.php";

$query = "
SELECT idx, created_at, date_format(created_at, \"%m-%d %H:00\") as DF,
    (MAX(IF(board_number=17, data1, NULL)) - MIN(IF(board_number=17, data1, NULL)) ) as daily_1building,
    (MAX(IF(board_number=18 , data1, NULL)) - MIN(IF(board_number=18 , data1, NULL)) ) as daily_2building,
    (MAX(IF(board_number=19 , data1, NULL)) - MIN(IF(board_number=19 , data1, NULL)) ) as daily_3building,
    (MAX(IF(board_number=3 , data1, NULL)) - MIN(IF(board_number=3 , data1, NULL)) ) as daily_4building,
    (MAX(IF(board_number=4 , data1, NULL)) - MIN(IF(board_number=4 , data1, NULL)) ) as daily_5building
FROM upa.raw_data
WHERE address= 2300 and created_at >= \"2024-1-5 17:00:00\" and created_at < now()
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
$daily_4building_arr = array();
$daily_5building_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($daily_1building_arr, array($k, ($v['daily_1building'])));
    array_push($daily_2building_arr, array($k, ($v['daily_2building'])));
    array_push($daily_3building_arr, array($k, ($v['daily_3building'])));
    array_push($daily_4building_arr, array($k, ($v['daily_4building'])));
    array_push($daily_5building_arr, array($k, ($v['daily_5building'])));
    array_push($create_at_arr, array($k, substr($v['DF'],5,11)));
}

$daily_1building = array(
    'data' => $daily_1building_arr,
    'color'=>'#ff0000',
);

$daily_2building = array(
    'data' => $daily_2building_arr,
    'color'=>'#ff6600',
);

$daily_3building = array(
    'data' => $daily_3building_arr,
    'color'=>'#00ff3b',
);

$daily_4building = array(
    'data' => $daily_4building_arr,
    'color'=>'#0004ff',
);

$daily_5building = array(
    'data' => $daily_5building_arr,
    'color'=>'#9d00ff',
);

//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('daily_1building'=>$daily_1building, 'daily_2building'=>$daily_2building, 'daily_3building'=>$daily_3building, 'daily_4building'=>$daily_4building, 'daily_5building'=>$daily_5building,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
