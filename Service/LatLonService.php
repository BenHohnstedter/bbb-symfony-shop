<?php

namespace App\Service;

class LatLonService
{
    public function getLanLonFromAddress($street, $houseNumber, $city, $postalCode): ?array
    {
        $arguments = [
            'http' => [
                'method' => 'GET',
                'header' => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36\r\n',
            ],
        ];

        $address = rawurlencode($street.' '.$houseNumber.' '.$city.' '.$postalCode);

        $context = stream_context_create($arguments);

        $addressLink = file_get_contents('http://nominatim.openstreetmap.org/search?q='.$address.'&format=json&polygon=1&addressdetails=1', context: $context);

        $latLon = json_decode(
            $addressLink,
            true,
        );

        if (isset($latLon[0]['lat'])) {
            return [
                'lat' => $latLon[0]['lat'],
                'lon' => $latLon[0]['lon'],
            ];
        } elseif (isset($latLon[1]['lat'])) {
            return [
                'lat' => $latLon[1]['lat'],
                'lon' => $latLon[1]['lon'],
            ];
        } else {
            return null;
        }
    }
}
