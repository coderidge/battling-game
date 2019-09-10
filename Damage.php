<?php
/**
 * @description function calculate the damage done
 * @var $damage integer
 * @var $attackerStrength integer
 * @var $defenderDefence integer
 *
 */
class Damage
{
    // damage done is  damage = Attacker strength – Defender Defense
    public static function done($attackerStrength,$defenderDefence)
    {
        $damage = ($attackerStrength - $defenderDefence);

        return $damage;

    }

}