<?php
function nav_item(string $file, string $name, string $linkClass = ''): string
{
  $class = 'nav-link';

  if ($_SERVER['SCRIPT_NAME'] === $file) $class .= ' active';

  return <<<HTML
  <li class="$linkClass">
    <a class="$class" href="$file">$name</a>
  </li>
  HTML;
}

function nav_menu(string $linkClass = ''): string
{
  return
    nav_item('/index.php', 'Accueil', $linkClass) .
    nav_item('/contact.php', 'Contact', $linkClass) .
    nav_item('/jeu.php', 'Jeu', $linkClass);
}

function checkbox(string $name, string $value, array $datas): string
{
  $attributes = '';
  if (isset($datas[$name]) && in_array($value, $datas[$name])) $attributes .= 'checked';

  return <<<HTML
    <input type="checkbox" name="{$name}[]" id="$value" value="$value" $attributes />
  HTML;
}

function radio(string $name, string $value, array $datas): string
{
  $attributes = 'required';
  if (isset($datas[$name]) && $datas[$name] === $value) $attributes .= ' checked';

  return <<<HTML
    <input type="radio" name="$name" id="$value" value="$value" $attributes />
  HTML;
}

function creneaux_html(array $creneaux): string
{
  if (empty($creneaux)) return 'Fermé';

  $new_creneaux = [];
  foreach ($creneaux as $creneau) {
    $new_creneaux[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
  }

  return 'Ouvert ' . implode(' et ', $new_creneaux);
}

function in_creneaux(int $heure, array $creneaux): bool
{
  foreach ($creneaux as $creneau) {
    if ($heure >= $creneau[0] && $heure < $creneau[1]) return true;
  }

  return false;
}
