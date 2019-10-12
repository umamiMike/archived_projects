<?php

    class NumberToWord {

        function getWord($input) {
            $ten_check = intval(substr($input, -2));
            // $minus_ten = $ten_check - 10;
            $split_number = array_reverse(str_split($input));
            $chunked_number = array_chunk($split_number, 3);
            $thousands_counter = 0;
            $array_tens = array(0,1,2,3,4,5,6,7,8,9,"ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen",
                            "sixteen", "seventeen", "eighteen", "nineteen");


            $array_ones = array(array(0,"one", "two", "three", "four", "five", "six", "seven", "eight", "nine"),
                            array(0, 0, "twenty", "thirty", "fourty", "fifty", "sixty", "seventy", "eighty", "ninety"),
                            array(0, "one hundred", "two hundred", "three hundred", "four hundred", "five hundred",
                            "six hundred", "seven hundred", "eight hundred", "nine hundred"));


            $array_thousands = array("","thousand","million","billion","trillion","quadrillion");
            $output = "";

//var_dump($ten_check);

            foreach($chunked_number as $thousands) { //[1,1,1],[2,2,2],[1,2]
                $ones_counter = 0;
                $output = " " . $array_thousands[$thousands_counter] . $output;
                $thousands_counter++;

                foreach($thousands as $ones){
                    if (($ten_check > 9) && ($ten_check < 20)) {//only when ten check is between 10 and 19 for twlve etc...

                        if (($ones_counter > 2) && ($thousands_counter == 0)){//only if we are in the 10s
                        $output = $array_tens[$ten_check];
                        }
                    }
                    else
                    {

                    $output = " " . $array_ones[$ones_counter][$ones] . $output;
                    $ones_counter++;
                    }//End If/Else Statement
                }//ends foreach
            }



            return $output;
        }//end function

    }//end class

?>
