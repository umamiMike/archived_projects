
<?php
    require_once "src/RepeatCounter.php";
    class myRepeatCounterTest extends PHPUnit_Framework_TestCase
    {

        // 1. when givn two string inputs should return an array.
        // I:"String","String"
        // O:[]

        function test_RepeatCounter_isAnArray()
        {
            //arrange
            $test_repeatCounter = new RepeatCounter;
            $input1 = "String";
            $input2 = "String";


            $result = $test_repeatCounter->countRepeats($input1,$input2);

            //assert
            $this->assertTrue(is_array($result));
        }

        // 2. first element of array should be an integer: the number of times $input1 occurs in $input2
        // I: "string""string string"
        // O: ["no_of_occurences" => "2"]

        function test_RepeatCounter_firstElementInReturnIsInt()
        {
            //arrange
            $test_repeatCounter = new RepeatCounter;
            $input1 = "string";
            $input2 = "string string";


            $result = $test_repeatCounter->countRepeats($input1,$input2);

            //assert
            $this->assertTrue(is_integer($result["no_of_occurences"]));
        }



        // 3. The second element of the array should be an array we will keyed string_array. This will become important later in the story.
        // I: "string""string string"
        // O: ["no_of_occurences" => "2",[]]

        function test_RepeatCounter_secondElementIsArray()
        {
            //arrange
            $test_repeatCounter = new RepeatCounter;
            $input1 = "string";
            $input2 = "string string";


            $result = $test_repeatCounter->countRepeats($input1,$input2);

            //assert
            $this->assertTrue(is_array($result["string_array"]));
        }


        // 4. 3rd element in array equals input1
        // I:"String","The String"
        // O: [["no_of_occurences" => "1"],[[0] => "The ",[1] => "String"],"String"]

        function test_RepeatCounter_ThirdElementEqualsInput1()
        {
            //arrange
            $test_repeatCounter = new RepeatCounter;
            $input1 = "string";
            $input2 = "string string";


            $result = $test_repeatCounter->countRepeats($input1,$input2);

            //assert
            $this->assertEquals($input1,$result["input_string"]);
        }

//check whether imploding the string array will equal the second input.  To make sure I am getting back what I sent.
//Input:  $input1 = "string";
        //$input2 = "string string o the string is the string o the strings"

//Output: return["string_array"] == "string string o the string is the string o the strings"

        function test_RepeatCounter_implodedSecondElementEqualsInput2()
        {
            //arrange
            $test_repeatCounter = new RepeatCounter;
            $input1 = "string";
            $input2 = "string string o the string is the string o the strings";


            $result = $test_repeatCounter->countRepeats($input1,$input2);

            //assert
            $this->assertEquals($input2,implode(" ",$result["string_array"]));
        }


//Making sure the value of "no_of_occurences is correct"

//Input:  $input1 = "string";
        //$input2 = "string string o the string is the string o the strings"

//Output: $result["no_of_occurences"] = 5
        function test_RepeatCounter_firstElementReturnsCorrectNumber()
        {
            //arrange
            $test_repeatCounter = new RepeatCounter;
            $input1 = "string";
            $input2 = "string string o the string is the string o the strings";


            $result = $test_repeatCounter->countRepeats($input1,$input2);

            //assert
            $this->assertEquals(5,$result["no_of_occurences"]);
        }




      }

      ?>
