<?php
$horaires = [];

while (true) {
  $debut = (int)readline("Entrez une heure d'ouverture : ");
  $fin = (int)readline("Entrez une heure de fermeture : ");

  if ($debut >= $fin) echo "L'heure d'ouverture doit être strictement inférieur à l'heure de fermteure\n";
  else {
    $horaires[] = [$debut, $fin];
    $action = readline("Voulez-vous rajouter des horaires (o/n) : ");

    if ($action === 'n') break;
  }
}

echo 'Le magasin est ouvert de ';
foreach ($horaires as $key => $horaire) {
  if ($key > 0) echo ' et de ';
  echo $horaire[0] . 'h à ' . $horaire[1] . 'h';
}

echo PHP_EOL;

// $heure = (int)readline('Heure de visite du magasin : ');
// $ouvert = false;

// foreach ($horaires as $horaire) {
//   if ($heure >= $horaire[0] && $heure <= $horaire[1]) {
//     $ouvert = true;
//     break;
//   }
// }

// if ($ouvert) echo 'Le magasin est ouvert';
// else echo 'Le magasin est fermé';
