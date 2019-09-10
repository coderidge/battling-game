<?php
include_once('Luck.php');
/**
 * @description sets special skills for each Battler
 * Swordsman - Lucky strike 5% chance for strength doubling
 * Brute - Stunning Blow 2% chance of opponent missing
 * Grappler - When grappler evades an attack, opponent dealt damage 10
 *
 * @return integer boolen true or lucky strike calculates property
 */

class SpecialSkills
{
    protected $property;

    const PERCENTAGE_LUCKY_STRIKE = 5;
    const PERCENTAGE_STUNNING_BLOW = 2;
    const COUNTER_ATTACK_DAMAGE = 10;

    public static function LuckyStrike($property) {

       if(Luck::calc(self::PERCENTAGE_LUCKY_STRIKE) == 1) {
         return  $property * 2;
       } else {
         return $property;
       }
    }

    public static function StunningBlow() {

        return Luck::calc(self::PERCENTAGE_STUNNING_BLOW);

    }

    public static function CounterAttack() {

        return self::COUNTER_ATTACK_DAMAGE;

    }
}