<?php
$heure = (int)readline('Entrez une heure : ');

if (($heure >= 9 && $heure <= 12) || ($heure >= 14 && $heure <= 17)) {
  echo 'Le magasin est ouvert';
} else {
  echo 'Le magasin est fermé';
}

// switch ($action) {
//   case 1:
//     echo "J'attaque";
//     break;

//   case 2:
//     echo 'Je défends';
//     break;

//   case 3:
//     echo 'Je passes mon tour';
//     break;

//   default:
//     echo 'Commande inconnue';
//     break;
// }
