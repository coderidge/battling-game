<?php
/** Class Combatants
 * @description creates get and set for each player properties
 * @var $name string
 * @var $health integer
 * @var $strength integer
 * @var $defence integer
 * @var $speed integer
 * @var $luck float
 *
 */
abstract class Combatants
{
    protected $name;
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    public function setName(string $name) {

        $this->name = $name;
    }

    public function getName() {

        return $this->name;
    }

    function setHealth(int $health)
    {
        $this->health = $health;
    }

    function getHealth() {

        return $this->health;
    }

    function setStrength(int $strength)
    {
        $this->strength = $strength;
    }

    function getStrength() {

       return $this->strength;
    }

    function setDefense(int $defense)
    {
        $this->defence = $defense;
    }

    function getDefence() {

        return $this->defence;
    }

    function setSpeed(int $speed) {

        $this->speed = $speed;
    }

    function getSpeed() {

        return $this->speed;
    }

    function setLuck(float $luck) {

        $this->luck = $luck;
    }

    function getLuck() {

       return $this->luck;

    }

}