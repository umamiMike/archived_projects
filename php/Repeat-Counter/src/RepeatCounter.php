<?php

class RepeatCounter {

function countRepeats($input1 = "none",$input2 = "none")
        {
            
        $return_array = array();

        $no_of_occurences = substr_count($input2,$input1);

            $return_array["no_of_occurences"] = $no_of_occurences;
            //$myString = explode(" ",$input2);
            $myString = array_map('trim', explode(' ', $input2));
            $return_array["string_array"] = $myString;
            $return_array["input_string"] = $input1;
//print_r($no_of_occurences);

//var_dump($return_array);
            return $return_array;

        }

}


 ?>
