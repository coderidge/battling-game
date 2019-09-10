<?php
include_once ('Combatants.php');

/**
 * Class Fighter
 * @description extends combatants to add battler
 * @var $battler string
 */
class Fighter extends Combatants
{
    protected $battler;

    public function setBattler(string $battler) {
        $this->battler = $battler;
    }

    public function getBattler() {
        return $this->battler;
    }
}


