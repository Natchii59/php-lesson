<?php
$d = '2010-04-01';
$d2 = '2022-06-02';

$date = new DateTime($d);
$date2 = new DateTime($d2);
echo $date->diff($date2, true)->format('%d days, %m months, %y years') . PHP_EOL;
