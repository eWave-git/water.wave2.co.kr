<?php



include_once "../connect.php";



foreach ($_REQUEST as $k => $v) {
    $$k = $v;
}


function createdTable_1($rows, $field_1, $field_2) {
    echo "<table>";
    echo "<tr><td>{$field_1}</td><td>{$field_2}</td></tr>";
    foreach ($rows as $k => $v) {
        ?>
        <tr>
            <td><?php echo substr( $v[$field_1],0,16)?></td><td><?php echo round($v[$field_2],2)?></td>
        </tr>
        <?php
    }
    echo "</table>";
}
function createdTable_2($rows, $field_1, $field_2, $field_3, $field_4) { // 선혁 만들어보고 있음
    echo "<table>";
    echo "<tr><td>{$field_1}</td><td>{$field_2}</td><td>{$field_3}</td><td>{$field_4}</td></tr>";
    foreach ($rows as $k => $v) {
        ?>
        <tr>
            <td><?php echo substr( $v[$field_1],0,16)?></td>
            <td><?php echo round($v[$field_2],2)?></td>
            <td><?php echo round($v[$field_3],2)?></td>
            <td><?php echo round($v[$field_4],2)?></td>
        </tr>
        <?php
    }
    echo "</table>";
}

if ($md_id && $sensor && $sdateAtedate) {

    $file_name = $sensor."_excel.xls";

    header( "Content-type: application/vnd.ms-excel; charset=utf-8");     // 아래 3줄을 주석 처리하면 화면에 데이터를 뿌려줌
    header( "Content-Disposition: attachment; filename = $file_name" );     //filename = 저장되는 파일명을 설정합니다.
    header( "Content-Description: PHP4 Generated Data" );


    $s = explode(" - ",$sdateAtedate );
    $sdate = $s[0]." 00:00:00";
    $edate = $s[1]." 23:59:59";

    if ($sensor == "daily"){
        $query = "
        SELECT idx, create_at, date_format(create_at, \"%m-%d\") as DF,
            (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as daily_1building,
            (MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10 as daily_2building,
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

        createdTable_2($rows, 'DF','daily_1building','daily_2building','daily_3building');


    } else if ($sensor == "time") {
        $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DF,
            (MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10 as time_1building,
            (MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10 as time_2building,
            (MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10 as time_3building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DF
        order by idx asc;
    ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_2($rows, 'DF', 'time_1building','time_2building','time_3building');



    } else if ($sensor == "time_sum") {
        $query = "
        SELECT idx, create_at, 
            DATE_FORMAT(create_at, \"%m-%d %H:00\") as DF,
            SUM((MAX(IF(board_number=3, data3, NULL)) - MIN(IF(board_number=3, data3, NULL)) )*10) OVER(order by create_at) AS time_sum_1building,
            SUM((MAX(IF(board_number=3, data4, NULL)) - MIN(IF(board_number=3, data4, NULL)) )*10) OVER(order by create_at) AS time_sum_2building,
            SUM((MAX(IF(board_number=2, data3, NULL)) - MIN(IF(board_number=2, data3, NULL)) )*10) OVER(order by create_at) AS time_sum_3building
        FROM water.raw_data
        where create_at >= '{$sdate}' and create_at <= '{$edate}' 
        group by DF
        order by DF asc;
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;
        createdTable_2($rows, 'DF', 'time_sum_1building','time_sum_2building','time_sum_3building');


    } else if ($sensor == "dataAll") {
        $query = "
            SELECT idx, create_at, address,
                IF(board_number=3, data3, NULL) as 1building,
                IF(board_number=3, data4, NULL) as 2building,
                IF(board_number=2, data3, NULL) as 3building
            FROM water.raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}' 
            order by idx asc;
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_2($rows,'create_at','1building','2building','3building');

    } else if ($sensor == "sum_room2") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                avg(data3) as data3
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data3','DATE');

    } else if ($sensor == "time_room2") {
        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                avg(data4) as data4
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data4','DATE');

    } else if ($sensor == "sum_room3") {

        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                avg(data5) as data5
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data5','DATE');

    } else if ($sensor == "time_room3") {

        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                avg(data6) as data6
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data6','DATE');

    } else if ($sensor == "time_dataAll") {

        $query = "
            select
                DATE_FORMAT(create_at, '%Y-%m-%d %H:%i:00') as DATE,
                avg(data7) as data7
            from raw_data
            where create_at >= '{$sdate}' and create_at <= '{$edate}'
            group by DAY(create_at),FLOOR(MINUTE(create_at)/1)*10
            order by DATE asc
        ";

        $result = mysqli_query($conn, $query);
        $rows = array();
        while($row = mysqli_fetch_array($result))
            $rows[] = $row;

        createdTable_1($rows, 'data7','DATE');

    } else if ($sensor == "POWER") {
        // 모름

    }


}
