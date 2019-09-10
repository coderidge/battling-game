<?php
/**
 * Class Luck
 * @description this calculates the chance for % e.g 50% 50/50 chance
 * @var $percent integer
 * returns 1 or null
 */
class Luck
{
    public static function calc($percent):bool
    {
        return mt_rand(0, 99) < $percent;
    }

}


