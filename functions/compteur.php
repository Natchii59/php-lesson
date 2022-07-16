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
