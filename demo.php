<?php
$classe = [
  [
    'prenom' => 'Marc',
    'nom' => 'Doe',
    'notes' => [10, 20, 14],
  ],
  [
    'prenom' => 'Jean',
    'nom' => 'Doe',
    'notes' => [7, 18, 13],
  ],
];

echo $classe[1]['notes'][2];
