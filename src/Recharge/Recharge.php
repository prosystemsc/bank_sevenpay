<?php

namespace SevenPay\Recharge;

use GuzzleHttp\Client as Client;
use \SevenPay\Exception\HttpError;
use \SevenPay\SevenPay;

class Recharge
{
    public function __construct(SevenPay $SevenPay)
    {
        $this->public_id = $SevenPay->code;
    }

    public function createTed($data)
    {
        $url = SevenPay::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
        ];
        $data['public_id'] = $this->public_id;

        $params = [
            'headers' => $headers,
            'json' => $data,
        ];
        $params = [
            'multipart' => [
                ['name' => 'public_id', 'contents' => $data['public_id']],
                ['name' => 'value', 'contents' => $data['value']],
                ['name' => 'reference', 'contents' => $data['reference']],
                ['name' => 'name', 'contents' => $data['name']],
                ['name' => 'document', 'contents' => $data['document']],
                ['name' => 'email', 'contents' => $data['email']],
                ['name' => 'address', 'contents' => $data['address']],
                ['name' => 'zip_code', 'contents' => $data['zip_code']],
                ['name' => 'district', 'contents' => $data['district']],
                ['name' => 'city', 'contents' => $data['city']],
                ['name' => 'state', 'contents' => $data['state']],
                ['name' => 'file', 'contents' => fopen($data['file'], 'r')],
            ],
        ];

        $response = $client->post('recharge/ted', $params);

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

    public function merchant($data)
    {
        $url = SevenPay::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);
        $headers = [
            'Content-Type: application/json',
        ];
        $data = ['public_id' => $this->public_id, 'value' => $data['value'], 'two_factor' => $data['two_factor'], 'email' => $data['email'], 'type' => $data['type']];
        $params = [
            'headers' => $headers,
            'json' => $data,
        ];

        $response = $client->post('transf/user/recharge', $params);

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

    public function client($data)
    {
        $url = SevenPay::URL;
        $client = new Client(['base_uri' => $url, 'http_errors' => false]);
        $headers = [
            'Content-Type: application/json',
        ];
        $data = ['public_id' => $this->public_id, 'value' => $data['value'], 'two_factor' => $data['two_factor'], 'email' => $data['email'], 'type' => $data['type']];
        $params = [
            'headers' => $headers,
            'json' => $data,
        ];

        $response = $client->post('transf/user/withdraw', $params);

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
