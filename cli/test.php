<?php
$path = __DIR__ . DIRECTORY_SEPARATOR . 'demo.csv';
$file = fopen($path, 'r+');

$k = 0;
while ($line = fgets($file)) {
  $k++;
  if ($k == 1) {
    fwrite($file, 'Coucou');
    break;
  }
}
fclose($file);
