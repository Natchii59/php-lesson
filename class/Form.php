<?php
class Form
{
  public static $class = 'form-control';

  public static function checkbox(string $name, ?string $value = null, ?array $datas = null): string
  {
    $attributes = '';
    if (isset($datas[$name]) && in_array($value, $datas[$name])) $attributes .= 'checked';

    $attributes .= ' class="' . self::$class . '"';

    return <<<HTML
    <input type="checkbox" name="{$name}[]" id="$value" value="$value" $attributes>
    HTML;
  }

  public static function radio(string $name, string $value, array $datas): string
  {
    $attributes = 'required';
    if (isset($datas[$name]) && $datas[$name] === $value) $attributes .= ' checked';

    $attributes .= ' class="' . self::$class . '"';

    return <<<HTML
      <input type="radio" name="$name" id="$value" value="$value" $attributes>
    HTML;
  }
}
