<?php

function demander_creneau(string $phrase = 'Veuillez entrer un créneau'): array
{
  echo $phrase . PHP_EOL;

  while (true) {
    $ouverture = (int)readline("Heure d'ouverture : ");
    if ($ouverture >= 0 && $ouverture <= 23) break;
  }

  while (true) {
    $fermeture = (int)readline("Heure de fermeture : ");
    if ($fermeture >= 0 && $fermeture <= 23 && $ouverture < $fermeture) break;
  }

  return [
    'ouverture' => $ouverture,
    'fermeture' => $fermeture,
  ];
}

function demander_creneaux(string $phrase = 'Veuillez entrer des créneaux'): array
{
  echo $phrase . PHP_EOL;
  $creneaux = [];

  while (true) {
    $creneaux[] = demander_creneau();

    $action = strtolower(readline('Voulez-vous ajouter un créneau ? (o/n) '));
    if ($action === 'n') break;
  }

  return $creneaux;
}
