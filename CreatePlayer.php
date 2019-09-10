<?php
include_once('RandomPlayer.php');
include_once('Combatants.php');
/**
 * @description picks a random battler and sets random properties for battler
 * @var $battler string
 * @var $name string
 *
 */
class CreatePlayer
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function Player() {

       $battler = RandomPlayer::returnPlayer();

       $fighter = new Fighter();
       $fighter->setName($this->name);
       $fighter->setBattler($battler);
       $fighter->setHealth(RandomPlayer::playerProperties($battler,'health'));
       $fighter->setStrength(RandomPlayer::playerProperties($battler,'strength'));
       $fighter->setDefense(RandomPlayer::playerProperties($battler,'defence'));
       $fighter->setSpeed(RandomPlayer::playerProperties($battler,'speed'));
       $fighter->setLuck(RandomPlayer::playerProperties($battler,'luck'));

       return $fighter;

    }

}


