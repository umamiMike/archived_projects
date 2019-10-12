<?php
echo "first we create a class of person\n";
class person {
  public $FirstName = "Bill";
  public $MiddleName = "Terence";
  public $LastName = "Murphy";
  private $Password = "Poppy";
  public $Age = 29;
  public $HomeTown = "Edinburgh";
  public $FavouriteColour = "Purple";
}
echo "then we instantiate that person\n";
$bill = new person();
echo "then we create a function echoVar with the key and value from the array we will feed it\n";
function echoVar($val, &$key){
  echo $key . " is: " . $val . "\n" ;
}
echo "then we get an array of the object vars via php magic get_object_varsi\n"; 
$obPropsAsArray = get_object_vars($bill);
echo "then we use array_walk with a call to the echoVar function\n";
$b = array_walk($obPropsAsArray,"echoVar");
?>
