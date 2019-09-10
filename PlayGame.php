<?php
include_once('CreatePlayer.php');
include_once('Combatants.php');
include_once('Fighter.php');
include_once('Damage.php');
include_once('Health.php');
include_once('Luck.php');
include_once('SpecialSkills.php');
/**
 * @description take players name, assign battler to each player
 * runs through sequence
 * start in command line by entering 'php PlayGame.php player1stname player2ndname'
 * $playerOne string
 * $playerTwo string
 * $player1name string
 * $player1battler integer
 * $player1health integer
 * $player1luck float
 * $player1strength integer
 * $player1defence integer
 * $player1speed integer
 * $player2name string
 * $player2battler string
 * $player2health integer
 * $player2strength integer
 * $player2defence integer
 * $player2luck float
 * $player2speed integer
 * $nextAttacker string
 * $attack integer
 * $stunned integer
 */

class PlayGame
{
    protected $playerOne;
    protected $playerTwo;
    protected $player1name;
    protected $player1battler;
    protected $player1health;
    protected $player1luck;
    protected $player1strength;
    protected $player1defence;
    protected $player1speed;
    protected $player2name;
    protected $player2battler;
    protected $player2health;
    protected $player2strength;
    protected $player2defence;
    protected $player2luck;
    protected $player2speed;
    protected $nextAttacker;
    protected $attack;
    protected $stunned;

    public function __construct(string $playerOne,string $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function startUp()
    {
        // create player 1
        $createdPlayer1 = new CreatePlayer($this->playerOne);

        $player1name = $createdPlayer1->Player()->getName();
        $this->player1name = $player1name;

        $player1battler = $createdPlayer1->Player()->getBattler();
        $this->player1battler = $player1battler;

        $player1health = $createdPlayer1->Player()->getHealth();
        $this->player1health = $player1health;

        $player1luck = $createdPlayer1->Player()->getLuck();
        $this->player1luck = $player1luck;

        $player1strength = $createdPlayer1->Player()->getStrength();
        $this->player1strength = $player1strength;

        $player1defence =  $createdPlayer1->Player()->getDefence();
        $this->player1defence = $player1defence;

        $player1speed =  $createdPlayer1->Player()->getSpeed();
        $this->player1speed = $player1speed;

        // create player 2
        $createdPlayer2 = new CreatePlayer($this->playerTwo);

        $player2name = $createdPlayer2->Player()->getName();
        $this->player2name = $player2name;

        $player2battler = $createdPlayer2->Player()->getBattler();
        $this->player2battler = $player2battler;

        $player2health = $createdPlayer2->Player()->getHealth();
        $this->player2health = $player2health;

        $player2luck = $createdPlayer2->Player()->getLuck();
        $this->player2luck = $player2luck;

        $player2strength = $createdPlayer2->Player()->getStrength();
        $this->player2strength = $player2strength;

        $player2defence =  $createdPlayer2->Player()->getDefence();
        $this->player2defence = $player2defence;

        $player2speed =  $createdPlayer2->Player()->getSpeed();
        $this->player2speed = $player2speed;

        // complete 30 games or break if health 0 or less
        for($this->attack = 1;$this->attack <= 30; $this->attack++) {

            if ($this->player1health <= 0) {
                return "GAME OVER.... $this->player2battler ($this->player2name) WINS!";
            }
            if ($this->player2health <= 0) {
                return "GAME OVER... $this->player1battler ($this->player1name)  WINS!";
            }
            if($this->attack === 30) {
                return 'GAME OVER ITS A DRAW';
            }

            ############## who attacks first #######################
            if ($this->attack === 1) {

                if ($this->player1speed == $this->player2speed) {
                    // if speed the same, one with lower defence goes 1st
                    if ($this->player1defence < $this->player2defence) {

                        self::PlayerOne();

                    } else {

                        self::PlayerTwo();
                    }

                } elseif ($this->player1speed > $this->player2speed) {

                   self::PlayerOne();

                } else {

                   self::PlayerTwo();
                }

            ######################### now take turns attacking ###################################
            } else {

               if($this->nextAttacker == 'player1') {

                   self::PlayerOne();

                   $this->nextAttacker = 'player2';

               } else {

                   self::PlayerTwo();

                   $this->nextAttacker = 'player1';
               }

            }
        }
    }

    public function PlayerOne() {

        $narrative = "$this->player1battler ($this->player1name) goes first against $this->player2battler ($this->player2name)" . PHP_EOL;
        echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~". PHP_EOL;
        echo "Narrative - ".$narrative;

        // workout luck
        if(Luck::calc(($this->player2luck * 100)) == 1 or $this->stunned == 1) {
            echo "Lucky!! $this->player1battler ($this->player1name) missed you $this->player2battler ($this->player2name)". PHP_EOL;
            $this->stunned = 0;
            if($this->player2battler === 'grappler') {
               echo "Grappler Evaded Attack, $this->player1battler Damage Done, Health Drops From $this->player1health To";
                $this->player1health = Health::playerHealth($this->player1health,SpecialSkills::CounterAttack());
               echo "$this->player1health" . PHP_EOL;
            }
        } else {
            if($this->player1battler === 'swordsman') {
               $damage = Damage::done(SpecialSkills::LuckyStrike($this->player1strength), $this->player2defence);
               echo 'Swordsman Strength Doubled' . PHP_EOL;
            } else {
               $damage = Damage::done($this->player1strength, $this->player2defence);
            }
            //damage subtracted from defenders health
            $health = Health::playerHealth($this->player2health, $damage);
            $this->player2health = $health;
            echo 'Damage Level  '. $damage. PHP_EOL;
            echo 'Player health  '. $this->player2health. PHP_EOL;
        }

        if($this->player1battler === 'brute') {
            if(SpecialSkills::StunningBlow() == 1):
                $this->stunned = 1;
                echo "Brute Attacked With Stunning Blow".PHP_EOL;
            endif;
        }
        $this->nextAttacker = 'player2';
    }

    public function PlayerTwo() {

        $narrative = "$this->player2battler ($this->player2name) goes first against $this->player1battler ($this->player1name)" . PHP_EOL;
        echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~". PHP_EOL; 
        echo 'Narrative - '. $narrative;
        // workout luck
        if(Luck::calc(($this->player1luck * 100)) == 1 or $this->stunned == 1) {
            echo "Lucky!! $this->player2battler ($this->player2name) missed you $this->player1battler ($this->player1name)". PHP_EOL;
            $this->stunned = 0;
            if($this->player1battler === 'grappler') {
               echo "Grappler Evaded Attack From $this->player2battler, Damage Done, Health Drops From $this->player2health To";
                $this->player2health = Health::playerHealth($this->player2health,SpecialSkills::CounterAttack());
                echo "$this->player2health". PHP_EOL;
            }
        } else {
            if($this->player2battler === 'swordsman') {
                $damage = Damage::done(SpecialSkills::LuckyStrike($this->player2strength), $this->player1defence);
                echo 'Swordsman Strength Doubled' . PHP_EOL;
            } else {
                $damage = Damage::done($this->player2strength, $this->player1defence);
            }
            //damage substracted from defenders health
            $health = Health::playerHealth($this->player1health, $damage);
            $this->player1health = $health;
            echo 'Damage Level - '. $damage. PHP_EOL;
            echo 'Player health - '. $this->player1health. PHP_EOL;
        }

        // if battler brute attacking
        if($this->player2battler === 'brute') {
            if(SpecialSkills::StunningBlow() == 1):
                $this->stunned = true;
                echo "Brute Attacked With Stunning Blow".PHP_EOL;
            endif;
        }
        $this->nextAttacker = 'player1';
    }
}


if (isset($argc)) {

    if(empty($argv[1]) || empty($argv[2])) {
    echo 'Please enter first player name and second player name';
    } else {
        if(strlen($argv[1]) > 30 || strlen($argv[2]) > 30) {
            echo 'Name too long, please enter names less than 30 chars';
        } else {
            $startup = new PlayGame($argv[1], $argv[2]);
            $result = $startup->startUp();
            print_r($result);
        }
    }
}
else {
    echo "argc and argv disabled\n";
}








