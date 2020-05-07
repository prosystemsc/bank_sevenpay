<?php

namespace SevenPay\Config;

use GuzzleHttp\Client as Client;
use \SevenPay\Exception\HttpError;
use \SevenPay\SevenPay;

class Callback
{
    public function __construct(SevenPay $SevenPay)
    {
        $this->public_id = $SevenPay->code;
    }

    public function config($callback)
    {
        $url = SevenPay::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);
        $headers = [
            'Content-Type: application/json',
        ];
        $data = ['public_id' => $this->public_id, 'url_callback' => $callback];
        $params = [
            'headers' => $headers,
            'json' => $data,
        ];

        $response = $client->post('config/callback', $params);

        $body = json_decode($response->getBody());
        if ($response->getStatusCode() == 200) {
            return $body;
        } else {
            if (isset($body->message)) {
                return $body;
            } else {
                throw new HttpError("Unable to decode JSON response from SevenPay: HTTP " . $response->getStatusCode());
            }
        }

    }

}
