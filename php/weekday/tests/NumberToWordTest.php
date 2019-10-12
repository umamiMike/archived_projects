<?php

    require_once "src/NumberToWord.php";


    //Testing ones place.  Input = 1, Output = "one"
    class NumberToWordTest extends PHPUnit_Framework_TestCase {

        function test_NumberToWord_ones() {
            //arrange
            $test_NumberValues = new NumberToWord;
            $input = "1";

            //act
            $result = $test_NumberValues->getWord($input);

            //assert
            $this->assertEquals(" one ", $result);
        }

        function test_NumberToWord_tens() {
            //arrange
            $test_NumberValues = new NumberToWord;
            $input = "12";

            //act
            $result = $test_NumberValues->getWord($input);

            //assert
            $this->assertEquals("twelve", $result);
        }

        function test_NumberToWord_hundreds1() {
            //arrange
            $test_NumberValues = new NumberToWord;
            $input = "333";

            //act
            $result = $test_NumberValues->getWord($input);

            //assert
            $this->assertEquals(" three hundred thirty three ", $result);
        }

        function test_NumberToWord_Thousands() {
            //arrange
            $test_NumberValues = new NumberToWord;
            $input = "1234567";

            //act
            $result = $test_NumberValues->getWord($input);

            //assert
            $this->assertEquals(" one million two hundred thirty four thousand five hundred sixty seven ", $result);
        }

        function test_NumberToWord_thousands_tens() {
            //arrange
            $test_NumberValues = new NumberToWord;
            $input = "123456789";

            //act
            $result = $test_NumberValues->getWord($input);

            //assert
            $this->assertEquals(" one hundred twenty three million four hundred fifty six thousand seven hundred eighty nine ", $result);
        }


    }//end class
?>
