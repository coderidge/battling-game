<?php

/**
 * Description: returns player at random and properties at random
 * @var $typePlayer string
 * @var $property integer or float
 *
 */
class RandomPlayer
{
    public $typePlayer;
    public $property;

    public static $players = ['swordsman','brute','grappler'];

    public static $swordsman = ['health' => ['from' => 40,'to' => 60],
    'strength' => ['from' => 60,'to' => 70],
    'defence' => ['from' => 20,'to' => 30],
    'speed' => ['from' => 90,'to' => 100],
    'luck' => ['from' => 0.3,'to' => 0.5]
    ];

    public static $brute = ['health' => ['from' => 90,'to' => 100],
        'strength' => ['from' => 65,'to' => 75],
        'defence' => ['from' => 40,'to' => 50],
        'speed' => ['from' => 40,'to' => 65],
        'luck' => ['from' => 0.3,'to' => 0.35]
    ];

    public static $grappler = ['health' => ['from' => 60,'to' => 100],
        'strength' => ['from' => 75,'to' => 80],
        'defence' => ['from' => 35,'to' => 40],
        'speed' => ['from' => 60,'to' => 80],
        'luck' => ['from' => 0.3,'to' => 0.4]
    ];


    public static function returnPlayer() {

    $ar = array_rand(self::$players);

    return self::$players[$ar];

    }

    public static function playerProperties(string $typePlayer,string $property) {

        switch($typePlayer) {

            case 'swordsman':

                if($property === 'luck') {

                $random = array_rand(range(self::$swordsman[$property]['from'], self::$swordsman[$property]['to'],0.01));
                $array = range(self::$swordsman[$property]['from'], self::$swordsman[$property]['to'],0.01);

                } else {

                $random = array_rand(range(self::$swordsman[$property]['from'], self::$swordsman[$property]['to']));
                $array = range(self::$swordsman[$property]['from'], self::$swordsman[$property]['to']);

                }

                return $array[$random];

            break;

            case 'brute':

                if($property === 'luck') {

                $random = array_rand(range(self::$brute[$property]['from'], self::$brute[$property]['to'],0.01));
                $array = range(self::$brute[$property]['from'], self::$brute[$property]['to'],0.01);


                } else {

                $random = array_rand(range(self::$brute[$property]['from'], self::$brute[$property]['to']));
                $array = range(self::$brute[$property]['from'], self::$brute[$property]['to']);

                }

                return $array[$random];

            break;

            case 'grappler':

                if($property === 'luck') {

                $random = array_rand(range(self::$grappler[$property]['from'], self::$grappler[$property]['to'],0.01));
                $array = range(self::$grappler[$property]['from'], self::$grappler[$property]['to'],0.01);

                } else {

                $random = array_rand(range(self::$grappler[$property]['from'], self::$grappler[$property]['to']));
                $array = range(self::$grappler[$property]['from'], self::$grappler[$property]['to']);

                }
                return $array[$random];

            break;

        }

    }

}

