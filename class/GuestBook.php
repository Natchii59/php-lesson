<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Message.php';

class GuestBook
{
  private string $path;

  public function __construct(string $path)
  {
    $this->path = $path;
  }

  public function addMessage(Message $message): void
  {
    file_put_contents($this->path, $message->toJSON() . PHP_EOL, FILE_APPEND);
  }

  public function getMessages(): array
  {
    $messages = [];

    $file = fopen($this->path, 'r');
    while ($line = fgets($file)) {
      $messages[] = Message::fromJSON($line);
    }
    fclose($file);

    return $messages;
  }
}
