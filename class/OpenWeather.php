<?php
class OpenWeather
{
  const BASE_URI = 'https://api.openweathermap.org/data/2.5';
  const UNITS = 'metric';
  const LANG = 'fr';

  private string $api_key;

  public function __construct(string $api_key)
  {
    $this->api_key = $api_key;
  }

  private function get_data_curl(string $url): array
  {
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($curl);

    if ($data === false) {
      var_dump(curl_error($curl));
      exit();
    }

    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200)  exit();

    $data = json_decode($data, true);

    curl_close($curl);

    return $data;
  }

  public function getToday(string $city): array
  {
    $data = $this->get_data_curl(self::BASE_URI . '/forecast/dailyq=' . $city . '&appid=' . $this->api_key . '&units=' . self::UNITS . '&lang=' . self::LANG);
    $date = new DateTime();
    $date->setTimestamp($data['dt']);

    return [
      'temp' => $data['main']['temp'],
      'description' => $data['weather'][0]['description'],
      'date' => $date,
    ];
  }
}
