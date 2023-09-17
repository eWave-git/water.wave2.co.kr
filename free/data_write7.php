<?php
ini_set( "display_errors", 1 );

foreach ($_REQUEST as $k => $v) {
		$$k = hexdec($v);
}


//$file_point = fopen("data_file.txt", "a+");
//fwrite($file_point, $_SERVER['QUERY_STRING'].'\n');
//fclose($file_point);




$date = date("Y-m-d");
$time = date("His");
$create_at = date("Y-m-d H:i:s");
$from_ip = $_SERVER['REMOTE_ADDR'];
$conn = mysqli_connect("database-2.cvdze1lptugg.ap-northeast-2.rds.amazonaws.com","wave2","crss6801!!","water") or die ("Can't access DB");

$address = dechex($add);

$bd_num = dechex($bd);
$bd_type = substr($bd_num, 0, 1);
$bd_number = substr($bd_num, 1, 1);


// $da7 = dechex($d7);
// $da8 = dechex($d8);


if ($bd_type != 1) {


	 if ($address == '999') {
	 	$d1 = 0;
	 	$d2 = 0;
	 } else if ($address == '998') {
	 	$d1 = 0;
	 	$d2 = 0;
	 }

	 if ($bd_type == 2) {
	 	$d8 = 0;
	 	$d1 = round($d1 / 65536 * 175 - 46.85,1); //온도센서
	 	$d2 = round($d2 / 65536 * 125 - 6, 1); // 습도센서
	 	if ($d2>99.9){
	 		$d2 = 99.9;
	 	}
	 	$d7 = round($d7 / 1.2, 1); // 조도센서
	 } else if ($bd_type == 3) {
	 	$d8 = 0;
	 	$d1 = round($d1 / 10,1); //온도센서 AM2305
	 	$d2 = round($d2 / 10,1); //습도센서 AM2305
	 } else if ($bd_type == 4) {
	 	$d8 = 0;
	 	$d1 = round($d1 / 65536 * 100,1); //지습도 센서
	 	//$d2 = round(($d2 - 763) / 3332 * 14 , 1);
		
	 	if ($d2 < 763){
	 		$d2 = 0;
	 	}
	 	else {
	 		$d2 = round(($d2 - 763) / 3335 * 2500 , 1); // 401,501 버섯농장 PAR센서
	 	}

	 	if ($d3 < 763){
	 		$d3 = 0;
	 	} else {
	 	$d3 = round(($d2 - 763) / 3335 * 4000 , 1); // 301 버섯농장 PAR센서
	 	}
	
	 } else if ($bd_type == 5) {
	 	$d1 = round($d1 / 10,1);
	 	$d2 = round($d2 / 10,1);
	 	$d3 = round($d3 / 10,1);
	 	$d4 = round($d4 / 10,1);
	 	$d5 = round($d5 / 10,1);
	 	$d6 = round($d6 / 10,1);
	 	$d7 = round($d7 / 10,1);
	 	$d8 = round($d8 / 10,1);
	 } else if ($bd_type == 6) {
		$_d7 = substr($_REQUEST['d7'], 3, 2).substr($_REQUEST['d7'], 1, 2);
		$d7 = $_d7/1000;

		$_d8 = substr($_REQUEST['d8'], 3, 2).substr($_REQUEST['d8'], 1, 2);
		$d8 = '0'.$_d8;

		$d1 = ($_d8*10)+$d7;
	 }	 

	$sql = "INSERT INTO raw_data (`create_at`,`address`,`board_type`,`board_number`,`data1`,`data2`,`data3`,`data4`,`data5`,`data6`,`data7`,`data8`)
    		VALUES ('{$create_at}', $address, $bd_type, $bd_number, $d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8)";

	$result = mysqli_query($conn, $sql);
	
	$sql = "INSERT INTO upa.raw_data (`created_at`,`address`,`board_type`,`board_number`,	`data1`,`data2`,`data3`,`data4`,`data5`,`data6`,`data7`,`data8`)
	VALUES ('{$create_at}', $address, $bd_type, $bd_number, $d1, $d2, $d3, $d4, $d5, $d6, $d7, 0)";

  $result = mysqli_query($conn, $sql);

	}
	
$textdata = "@".$time."X000Y0000#<br>";



echo $textdata;




// http://ri.wave2.co.kr/free/data_write7.php?add=00000501&bd=43&d1=0ede9&d2=002fa&d3=00000&d4=00000&d5=00000&d6=00000&d7=00000&d8=00fff
?>
 
