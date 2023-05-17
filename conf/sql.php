<?php

$query = "
select
(
   SELECT data1
   FROM water.raw_data
   WHERE board_number=2
   order by create_at desc limit 1
   ) AS data1,
 (
    SELECT data2
   FROM water.raw_data
   WHERE board_number=2
   order by create_at desc limit 1
   ) AS data2,
(
    SELECT data1
   FROM water.raw_data
   WHERE board_number=3
   order by create_at desc limit 1
   ) AS data3,
   (
    SELECT data2
   FROM water.raw_data
   WHERE board_number=3
   order by create_at desc limit 1
   ) AS data4
";

?>
