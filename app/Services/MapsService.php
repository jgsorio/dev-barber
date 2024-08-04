<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MapsService
{
    protected static string $key;
    protected static Client $client;
    const URL = "https://maps.googleapis.com/maps/api/geocode/json";

    /**
     * @throws GuzzleException
     */
    public static function search(string $address): array
    {
        self::$client = new Client();
        self::$key = env('MAPS_KEY');
        $params = [
            'address' => $address,
            'key' => self::$key
        ];
        $response = self::$client->request('GET', self::URL . '?' . http_build_query($params));
        $response = json_decode($response->getBody(), true);
        return $response['results'][0]['geometry']['location'];
    }
}
