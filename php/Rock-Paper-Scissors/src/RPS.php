<?php

    class RPS
    {



        function returnWinner($player1,$player2)
            {
                if ($player1 === "rock") {
                    if ($player2 === "paper") {
                        return "Player 2";
                    } elseif ($player2 === "scissors"){
                        return "Player 1";
                    } else {
                        return "Tie";
                    }
                }

                if ($player1 === "paper") {
                    if ($player2 === "paper") {
                        return "Tie";
                    } elseif ($player2 === "scissors"){
                        return "Player 2";
                    } else {
                        return "Player 1";
                    }
                }

                if ($player1 === "scissors") {
                    if ($player2 === "paper") {
                        return "Player 1";
                    } elseif ($player2 === "scissors"){
                        return "Tie";
                    } else {
                        return "Player 2";
                    }
                }

            }



    }



 ?>
