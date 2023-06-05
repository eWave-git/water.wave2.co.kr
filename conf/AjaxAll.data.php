<?php
include_once "../connect.php";

foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}

$s = explode(" - ",$sdateAtedate );
$sdate = $s[0]." 00:00";
$edate = $s[1]." 23:59";


if ($sensor == "daily_1building") {
    $query = "


        SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
            (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as daily_1building
        FROM water.raw_data
        WHERE create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DF
        ORDER BY idx asc;

    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_in_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_in_arr, array($k, floor($v['daily_1building'])));
        array_push($create_at_arr, array($k, substr($v['DF'],0,16)));
    }

    $tds_in = array(
        'data' => $tds_in_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_in";
    $response['pay_load']['dataset'] = array('tds_in'=>$tds_in);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "time_1building") {
    $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DATE,
            (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as time_1building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DATE
        order by DATE asc;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, floor($v['time_1building'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "time_sum_1building") {
    $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DATE,
            SUM((MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10) OVER(order by create_at) AS time_sum_1building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DATE
        order by DATE asc;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, floor($v['time_sum_1building'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "daily_2building") {
    $query = "


        SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
            (MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10 as daily_2building
        FROM water.raw_data
        WHERE create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DF
        ORDER BY idx asc;

    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_in_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_in_arr, array($k, floor($v['daily_2building'])));
        array_push($create_at_arr, array($k, substr($v['DF'],0,16)));
    }

    $tds_in = array(
        'data' => $tds_in_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_in";
    $response['pay_load']['dataset'] = array('tds_in'=>$tds_in);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "time_2building") {
    $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DATE,
            (MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10 as time_2building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DATE
        order by DATE asc;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, floor($v['time_2building'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "time_sum_2building") {
    $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DATE,
            SUM((MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10) OVER(order by create_at) AS time_sum_2building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DATE
        order by DATE asc;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, floor($v['time_sum_2building'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "daily_3building") {
    $query = "


        SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
            (MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10 as daily_3building
        FROM water.raw_data
        WHERE create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DF
        ORDER BY idx asc;

    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_in_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_in_arr, array($k, floor($v['daily_3building'])));
        array_push($create_at_arr, array($k, substr($v['DF'],0,16)));
    }

    $tds_in = array(
        'data' => $tds_in_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_in";
    $response['pay_load']['dataset'] = array('tds_in'=>$tds_in);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "time_3building") {
    $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DATE,
            (MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10 as time_3building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DATE
        order by DATE asc;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, floor($v['time_3building'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} else if ($sensor == "time_sum_3building") {
    $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DATE,
            SUM((MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10) OVER(order by create_at) AS time_sum_3building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DATE
        order by DATE asc;
    ";

    $result = mysqli_query($conn, $query);
    $rows = array();
    while($row = mysqli_fetch_array($result))
        $rows[] = $row;

    $tds_out_arr = array();
    $create_at_arr = array();

    foreach ($rows as $k => $v) {
        array_push($tds_out_arr, array($k, floor($v['time_sum_3building'])));
        array_push($create_at_arr, array($k, substr($v['DATE'],0,16)));
    }

    $tds_out = array(
        'data' => $tds_out_arr,
        'color'=>'#3c8dbc',
    );

    $response = array();
    $response['pay_load']['success'] = "success";
    $response['pay_load']['datatype'] = "tds_out";
    $response['pay_load']['dataset'] = array('tds_out'=>$tds_out);
    $response['pay_load']['create_at'] = $create_at_arr;

    echo json_encode($response);

} 




?>