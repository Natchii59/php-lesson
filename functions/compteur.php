<?php
function add_compteur(): void
{
  $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
  $pathDaily = $path . '-' . date('Y-m-d');

  incr_compteur($path);
  incr_compteur($pathDaily);
}

function incr_compteur(string $path): void
{
  $compteur = 1;

  if (file_exists($path)) {
    $compteur = (int)file_get_contents($path);
    $compteur++;
  }

  file_put_contents($path, $compteur);
}

function read_compteur(): string
{
  $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
  return file_get_contents($path);
}

function read_compteur_daily(): string
{
  $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . date('Y-m-d');
  return file_get_contents($path);
}

function read_compteur_month(int $year, int $month): int
{
  $month = str_pad($month, 2, '0', STR_PAD_LEFT);
  $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "compteur-$year-$month-*";
  $files = glob($path);

  $total = 0;
  foreach ($files as $file) {
    $total += (int)file_get_contents($file);
  }

  return $total;
}

function read_compteur_year(int $year): int
{
  $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "compteur-$year-*-*";
  $files = glob($path);

  $total = 0;
  foreach ($files as $file) {
    $total += (int)file_get_contents($file);
  }

  return $total;
}

function read_compteur_details(int $year, ?int $month = null): array
{
  $month = $month ? str_pad($month, 2, '0', STR_PAD_LEFT) : null;
  $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "compteur-$year-" . ($month ?? '*') . '-*';
  $files = glob($path);

  $vues = [];
  foreach ($files as $file) {
    $fileSep = explode('-', basename($file));
    $vues[] = [
      'annee' => $fileSep[1],
      'mois' => $fileSep[2],
      'jour' => $fileSep[3],
      'visites' => (int)file_get_contents($file),
    ];
  }

  return $vues;
}
