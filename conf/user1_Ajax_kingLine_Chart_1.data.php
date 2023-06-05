<?php
include_once "../connect.php";

$query = "

    SELECT
        DATE_FORMAT(create_at, \"%y-%m-%d %H:%i\") as DF,
        data1
    from king.raw_data_upa2 
    where address = 1000 
        and board_number=4 
        and create_at >= now() - INTERVAL 24 hour
    group by  floor(DATE(DF)), floor(HOUR(DF)) ,floor(MINUTE(DF) / 10)
     order by idx asc;
    ";
//create_at >= now() - INTERVAL 30 minute
$result = mysqli_query($conn, $query);
$rows = array();
while($row = mysqli_fetch_array($result))
    $rows[] = $row;


$tds_in_arr = array();
$tds_out_arr = array();
$create_at_arr = array();

foreach ($rows as $k => $v) {
    array_push($tds_in_arr, array($k, $v['data1']));
    //array_push($tds_in_arr, array($k, floor($v['data1'])));
    //array_push($tds_out_arr, array($k, floor($v['tds_out'])));
    array_push($create_at_arr, array($k, substr($v['DF'],9,13)));
}

$tds_in = array(
    'data' => $tds_in_arr,
    'color'=>'#3c8dbc',
);

$tds_out = array(
    'data' => $tds_out_arr,
    'color'=>'#00c0ef',
);

//echo "<xmp>";
//print_r($tds_in);
//echo "</xmp>";

$response = array();
$response['pay_load']['success'] = "success";
$response['pay_load']['dataset'] = array('tds_in'=>$tds_in, 'tds_out'=>$tds_out,);
$response['pay_load']['create_at'] = $create_at_arr;

echo json_encode($response);

?>
