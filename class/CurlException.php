<?php
class CurlExpception extends Exception
{
  public function __construct($curl)
  {
    $this->message = curl_error($curl);
    curl_close($curl);
  }
}
