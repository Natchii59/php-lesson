<?php

function repondre_oui_non(string $phrase): bool
{
  while (true) {
    $result = strtolower(readline($phrase . ' - o/n '));
    if ($result === 'o') return true;
    elseif ($result === 'n') return false;
  }
}

require_once './functions_creneaux.php';
