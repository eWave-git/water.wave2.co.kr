<?php
include_once "../connect.php";

$query = "
    SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
        (max(data4)-ifnull(LAG(max(data4)) OVER (ORDER BY create_at, idx), 0))*10 as daily_2building
    FROM water.raw_data
    WHERE board_number=3
        AND create_at >= \"2023-05-13\" and create_at < current_date()
    group by DF
    ORDER BY idx asc;
    "; 
//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();
$i =0;
while($row = mysqli_fetch_array($result)) {
    if ($i > 0) {
        $rows[] = $row;
    }
    $i++;
}

$water_in_arr = array();
$water_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($water_in_arr, array($k, floor($v['daily_2building'])));
//    array_push($water_out_arr, array($k, floor($v['water_out'])));
    array_push($create_at_arr, array($k, substr($v['DF'],1,5)));
}

$water_in = array(
    'data' => $water_in_arr,
    'color'=>'#3c8dbc',
);

$water_out = array(
    'data' => $water_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($water_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('water_in'=>$water_in, 'water_out'=>$water_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
