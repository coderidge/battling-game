<?php
include_once('../RandomPlayer.php');
include_once ('../CreatePlayer.php');
include_once('../Fighter.php');
include_once('../PlayGame.php');
include_once('../Luck.php');
include_once('../SpecialSkills.php');

class CombatTest extends PHPUnit_Framework_Testcase {

    public function testPlayer() {

       $rand_test = new RandomPlayer();

        $result = $rand_test->returnPlayer();

       $this->assertTrue(is_string($result));
    }

    public function testDamage() {
        $d = Damage::done(99,39);

        $this->assertEquals($d,60);
    }

    public function testHealth() {
        $f = Health::playerHealth(20,10);

        $this->assertEquals($f,10);
    }

    public function testLuck() {
        $luck = Luck::calc((1 * 100));

        $this->assertEquals($luck,1);

    }

    //public function testLuckyStrike() {
    //    $strike = SpecialSkills::LuckyStrike(10);

    //    $this->assertEquals($strike,10);
   // }

    public function testCounterAttack() {
        $blow = SpecialSkills::CounterAttack();

        $this->assertEquals($blow,10);
    }



    public function testCreateHealth()
    {
        $result = RandomPlayer::playerProperties('swordsman', 'health');

        $this->assertTrue(is_int($result));
    }

    public function testCreateDefence()
    {
        $result = RandomPlayer::playerProperties('swordsman', 'defence');
        $this->assertTrue(is_int($result));

    }

    public function testCreateSpeed()
    {
        $result = RandomPlayer::playerProperties('swordsman', 'speed');
        $this->assertTrue(is_int($result));
    }

    public function testCreateStrength()
    {
        $result = RandomPlayer::playerProperties('swordsman', 'strength');
        $this->assertTrue(is_int($result));
    }

    public function testCreateLuck()
    {
        $result = RandomPlayer::playerProperties('swordsman','luck');
        $this->assertTrue(is_float($result));
    }

    #####################################################
    public function testCreateHealthbrute()
    {
        $result = RandomPlayer::playerProperties('brute', 'health');

        $this->assertTrue(is_int($result));
    }

    public function testCreateDefencebrute()
    {
        $result = RandomPlayer::playerProperties('brute', 'defence');
        $this->assertTrue(is_int($result));

    }

    public function testCreateSpeedbrute()
    {
        $result = RandomPlayer::playerProperties('brute', 'speed');
        $this->assertTrue(is_int($result));
    }

    public function testCreateStrengthbrute()
    {
        $result = RandomPlayer::playerProperties('brute', 'strength');
        $this->assertTrue(is_int($result));
    }

    public function testCreateLuckbrute()
    {
        $result = RandomPlayer::playerProperties('brute','luck');
        $this->assertTrue(is_float($result));
    }

    #################################################################
    public function testCreateHealthgrappler()
    {
        $result = RandomPlayer::playerProperties('grappler', 'health');

        $this->assertTrue(is_int($result));
    }

    public function testCreateDefencegrappler()
    {
        $result = RandomPlayer::playerProperties('grappler', 'defence');
        $this->assertTrue(is_int($result));

    }

    public function testCreateSpeedgrappler()
    {
        $result = RandomPlayer::playerProperties('grappler', 'speed');
        $this->assertTrue(is_int($result));
    }

    public function testCreateStrengthgrappler()
    {
        $result = RandomPlayer::playerProperties('grappler', 'strength');
        $this->assertTrue(is_int($result));
    }

    public function testCreateLuckgrappler()
    {
        $result = RandomPlayer::playerProperties('grappler','luck');
        $this->assertTrue(is_float($result));
    }



}