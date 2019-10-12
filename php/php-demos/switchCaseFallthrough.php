<?php
$testInput = [0,1,2,3,4,5];
foreach ($testInput as $i){
  echo "In the case of " . $i . ":   ";
  switch ($i) {
case 0:
case 1:
case 2:
   echo "i is less than 3 but not negative";
   break;
 case 3:
   echo "i is 3";

}
echo "\n" ;
}
?>
