<?php
class Message
{
  const LIMIT_USERNAME = 3;
  const LIMIT_MESSAGE = 3;

  private string $username;
  private string $message;
  private DateTime $date;

  public function __construct(string $username, string $message, ?DateTime $date = null)
  {
    $this->username = $username;
    $this->message = $message;
    $this->date = $date ?? new DateTime();
    $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
  }

  public function isValid(): bool
  {
    return empty($this->getErrors());
  }

  public function getErrors(): array
  {
    $errors = [];

    if (strlen($this->username) < self::LIMIT_USERNAME) $errors['username'] = 'Votre nom est trop court';
    if (strlen($this->message) < self::LIMIT_MESSAGE) $errors['message'] = 'Votre message est trop court';

    return $errors;
  }

  public function toHTML(): string
  {
    $username = htmlentities($this->username);
    $date = $this->date->format('d/m/Y à H\hi');
    $message = nl2br(htmlentities($this->message));

    return <<<HTML
    <p>
      <strong>$username</strong> <em>le $date</em><br />
      $message
    </p>
    HTML;
  }

  public function toJSON(): string
  {
    return json_encode([
      'username' => $this->username,
      'message' => $this->message,
      'date' => $this->date->getTimestamp(),
    ]);
  }

  public static function fromJSON(string $json_encoded): Message
  {
    $json = json_decode($json_encoded, true);
    $date = new DateTime();
    $date->setTimestamp($json['date']);

    return new Message($json['username'], $json['message'], $date);
  }
}
