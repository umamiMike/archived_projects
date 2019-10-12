<?php
    require_once "src/Player.php";

    class PlayerTest extends PHPUnit_Framework_TestCase
        {

            //arrange
//player is constructed appropriately  input: 'thisname','thisage','thisimage','thisemail'
//output:
            function testPlayer_Construct()
            {

                $testPlayer = new Player('thisname','thisage','thisimage','thisemail');

                $this->assertEquals('thisname',$testPlayer->getName());

            }



        }


?>
