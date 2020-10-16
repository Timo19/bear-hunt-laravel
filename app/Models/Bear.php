<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    use HasFactory;

    public static function findByCoordinates($lad, $long)
    {
        $huntable = [];

        $bears = self::all();

        foreach ($bears as $bear) {

            if(self::getDistanceBetweenPoints($lad, $long, $bear->latitude, $bear->longitude) <= 25) {
                $huntable[] = $bear;
            }

        }

        return $huntable;
    }

    private static function getDistanceBetweenPoints($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo) {
        $long1 = deg2rad($longitudeFrom);
        $long2 = deg2rad($longitudeTo);
        $lat1 = deg2rad($latitudeFrom);
        $lat2 = deg2rad($latitudeTo);

        // Haversine Formula
        $dlong = $long2 - $long1;
        $dlati = $lat2 - $lat1;

        $val = pow(sin($dlati / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($dlong / 2), 2);

        $res = 2 * asin(sqrt($val));

        $radius = 3958.756;

        $distance = ($res * $radius);

        return (int)($distance * 1.609344); // Return the result as distance in km.
    }
}
