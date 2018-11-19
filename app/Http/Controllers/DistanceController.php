<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DistanceController extends Controller
{
	public function distance(){
	$distance = self::calculate('Av. Luis Thayer Ojeda 1110, Providencia', 'García Reyes 421, Valdivia');
    dd($distance);

	}

    /**
     * Caculate distance from origins to destinations.
     *
     * @param $origins
     * @param $destinations
     *
     * @return int
     */
    public static function calculate($origins, $destinations)
    {
        $client = new Client();

        try {
            $response = $client->get(config('distance.api_url'), [
                'query' => [
                    'units'        => 'metric',
                    'origins'      => $origins,
                    'destinations' => $destinations,
                    'key'          => config('distance.api_key'),
                ],
            ]);
            $statusCode = $response->getStatusCode();
            if (200 === $statusCode) {
                $responseData = json_decode($response->getBody()->getContents());

                if (isset($responseData)) {
                    return [$responseData->rows[0]->elements[0]->distance->text,
                    $responseData->rows[0]->elements[0]->duration->text];                    
                }
            }

            return -1;
        } catch (Exception $e) {
            return -1;
        }
    }
}

