<?php
$insultes = ['merde', 'con'];
$insultes_censure = [];
foreach ($insultes as $insulte) {
  $insultes_censure[] = substr($insulte, 0, 1) . str_repeat('*', strlen($insulte) - 1);
}

$phrase = strtolower(readline('Entrez une phrase : '));

$phrase = str_replace($insultes, $insultes_censure, $phrase);

// foreach ($insultes as $insulte) {
//   $phrase = str_replace($insulte, str_repeat('*', strlen($insulte)), $phrase);
// }

echo $phrase . PHP_EOL;
