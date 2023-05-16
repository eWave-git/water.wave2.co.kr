<?php
include_once "../connect.php";

$query = "
    SELECT idx, date_format(create_at, \"%m-%d %H:00\") as checkpoint,
        (max(data4)-ifnull(LAG(max(data4)) OVER (ORDER BY create_at, idx), 0))*10 as 2dong
    FROM water.raw_data
    WHERE board_number=3
        AND create_at >= now() - INTERVAL 24 hour
    group by checkpoint
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

$pressure_in_arr = array();
$pressure_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($pressure_in_arr, array($k, $v['2dong']));
//    array_push($pressure_in_arr, array($k, floor($v['data2'])));
//    array_push($pressure_out_arr, array($k, floor($v['pressure_out'])));
    array_push($create_at_arr, array($k, substr($v['checkpoint'],6,5)));
}

$pressure_in = array(
    'data' => $pressure_in_arr,
    'color'=>'#3c8dbc',
);

$pressure_out = array(
    'data' => $pressure_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($pressure_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('pressure_in'=>$pressure_in, 'pressure_out'=>$pressure_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
