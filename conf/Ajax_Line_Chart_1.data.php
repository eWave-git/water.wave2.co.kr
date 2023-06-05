<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
        (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as daily_1building,
        MAX(data1) as hi_temp
    FROM water.raw_data
    WHERE create_at >= \"2023-05-13\" and create_at < current_date()
    group by DF
    ORDER BY idx asc;
        ";
$result = mysqli_query($conn, $query);
$rows = array();

while($row = mysqli_fetch_array($result))
    $rows[] = $row;

$query2 = "
    select create_at, date_format(create_at, \"%m-%d\") as DF,max(data1) as hi_temp,
    from water.raw_data
    WHERE create_at >= \"2023-05-13\" and create_at < current_date()
    group by DF
    ORDER BY idx desc;
        ";
$result2 = mysqli_query($conn, $query2);
$rows2 = array();

while($row2 = mysqli_fetch_array($result))
    $rows2[] = $row2;



$daily_1building_arr = array();
$hitemp_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($daily_1building_arr, array($k, $v['daily_1building']));
    array_push($hitemp_arr, array($k, $v['hi_temp']));
    array_push($create_at_arr, array($k, substr($v['DF'],1,5)));
}
foreach ($rows2 as $k => $v) {
    
    array_push($hitemp_arr, array($k, $v['hi_temp']));

}

$daily_1building = array(
    'data' => $daily_1building_arr,
    'color'=>'#3c8dbc',
);

$hitemp = array(
     'data' => $hitemp_arr,
     'color'=>'#FF0000',
);

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('daily_1building'=>$daily_1building, 'hitemp'=>$hitemp,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
