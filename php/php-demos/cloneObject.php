<?php

class MyClass {
  public $prop1;
  public $prop2;

    private $myArray = array();
    function pushSomethingToArray($var) {
        array_push($this->myArray, $var);
    }
    function getArray() {
        return $this->myArray;
    }

}

//push some values to the myArray of Mainclass
$myObj = new MyClass();
$myObj->pushSomethingToArray('blue');
$myObj->pushSomethingToArray('orange');
$myObj->prop1 = "totes";
$myObjClone = clone $myObj;
$myObj->pushSomethingToArray('pink');
$myObjClone->prop1 = "mcgotes";

//testing
print_r($myObj->getArray());     //Array([0] => blue,[1] => orange,[2] => pink)
print_r($myObjClone->getArray());//Array([0] => blue,[1] => orange)
print_r("myob prop 1 is: " . $myObj->prop1 . "\n");
print_r("wheras my ob clone prop 1 is: " . $myObjClone->prop1);

//so array  cloned 

?>
