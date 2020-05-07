<?php

namespace SevenPay\Banks;

use GuzzleHttp\Client as Client;
use \SevenPay\Exception\HttpError;
use \SevenPay\SevenPay;

class Banks
{
    public function __construct(SevenPay $SevenPay)
    {
        $this->public_id = $SevenPay->code;
    }

    public function allBanks()
    {
        $url = SevenPay::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);
        $headers = [
            'Content-Type: application/json',
        ];
        $data = ['public_id' => $this->public_id];
        $params = [
            'headers' => $headers,
            'json' => $data,
        ];

        $response = $client->get('list/banks', $params);

        $body = json_decode($response->getBody());
        if ($response->getStatusCode() == 200) {
            return $body;
        } else {
            if (isset($body->message)) {
                return $body;
            } else {
                throw new HttpError("Unable to decode JSON response from Bank: HTTP " . $response->getStatusCode());
            }
        }

    }

}
