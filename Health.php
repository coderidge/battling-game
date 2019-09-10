<?php
/**
 * Class Health
 * @description calculates damage, substracted from defenders health
 * @var $health integer
 * @var $defendersHealth integer
 * @var $damage integer
 */
class Health
{
    public static function playerHealth($defendersHealth,$damage):int {

        $health = ($defendersHealth - $damage);

        return $health;
    }
}