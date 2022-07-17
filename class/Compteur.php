<?php
class Compteur
{
  const INCREMENT = 1;

  protected string $path;


  public function __construct(string $path)
  {
    $this->path = $path;
  }

  public function incrementer(): void
  {
    $compteur = 1;

    if (file_exists($this->path)) {
      $compteur = (int)file_get_contents($this->path);
      $compteur += static::INCREMENT;
    }

    file_put_contents($this->path, $compteur);
  }

  public function recuperer(): int
  {
    if (!file_exists($this->path)) return 0;
    return (int)file_get_contents($this->path);
  }
}
