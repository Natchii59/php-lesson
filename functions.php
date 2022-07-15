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
    nav_item('/contact.php', 'Contact', $linkClass);
}
