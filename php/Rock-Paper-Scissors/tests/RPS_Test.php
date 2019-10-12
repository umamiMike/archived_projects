<?php
    require_once "src/RPS.php";

    class RPSTest extends PHPUnit_Framework_TestCase
    {
        function test_rockPaper()
        {
            $test_RPSTest = new RPS;
            $player1 = "rock";
            $player2 = "paper";

            $result = $test_RPSTest->returnWinner($player1, $player2);

            $this->assertEquals("Player 2", $result);
        }

        function test_rockScissors()
        {
            $test_RPSTest = new RPS;
            $player1 = "rock";
            $player2 = "scissors";

            $result = $test_RPSTest->returnWinner($player1, $player2);

            $this->assertEquals("Player 1", $result);
        }

        function test_paperScissors()
        {
            $test_RPSTest = new RPS;
            $player1 = "paper";
            $player2 = "scissors";

            $result = $test_RPSTest->returnWinner($player1, $player2);

            $this->assertEquals("Player 2", $result);
        }

        function test_paperRock()
        {
            $test_RPSTest = new RPS;
            $player1 = "paper";
            $player2 = "rock";

            $result = $test_RPSTest->returnWinner($player1, $player2);

            $this->assertEquals("Player 1", $result);
        }

        function test_scissorsRock()
        {
            $test_RPSTest = new RPS;
            $player1 = "scissors";
            $player2 = "rock";

            $result = $test_RPSTest->returnWinner($player1, $player2);

            $this->assertEquals("Player 2", $result);
        }

        function test_scissorsPaper()
        {
            $test_RPSTest = new RPS;
            $player1 = "scissors";
            $player2 = "paper";

            $result = $test_RPSTest->returnWinner($player1, $player2);

            $this->assertEquals("Player 1", $result);
        }
    }


 ?>
