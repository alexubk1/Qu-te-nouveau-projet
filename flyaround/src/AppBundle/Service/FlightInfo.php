<?php
/**
 * Created by PhpStorm.
 * User: ths
 * Date: 11/06/2018
 * Time: 10:50
 */

namespace AppBundle\Service;


class FlightInfo
{
    /**
     * @var string
     */
    private $unit;

    /*
     * Constructor
     *
     * @param string $unit  Defined in config.yml
     */

    public function __construct($unit){
        $this->unit =$unit;
    }

    /**
     * Distance calculation between latitude/longitude based on Harnive's formula
     * http://www.codecodex.com/wiki/Calculate_Distance_Between_Two_Points_on_a_Globe#PHP
     *
     * @param float $latitudeFrom  Departure
     * @param float $longitudeFrom Departure
     * @param float $latitudeTo    Arrival
     * @param float $longitudeTo   Arrival
     *
     * @return float
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $d = 0;
        $earth_radius = 6371;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));

        switch ($this-> unit) {
            case 'km':
                $d = $c * $earth_radius;
                break;
            case 'mi':
                $d = $c * $earth_radius / 1.609344;
                break;
            case 'nmi':
                $d = $c * $earth_radius / 1.852;
                break;
        }

        return $d;
    }

    /**
     * travel time calculation
     *
     * @param float $distance
     * @param float $speed
     * @return string
     */
    public function getTime($distance, $speed)
    {
        $i = ($distance/$speed);
        $j = $i - floor($i);
        $j = 60*$j;
        if ($j = 60){
            $duration = 1 ." h";
        }
        else {
            $duration = floor($i) . " h". round($j) . " m";
        }
        return $duration;
    }
}