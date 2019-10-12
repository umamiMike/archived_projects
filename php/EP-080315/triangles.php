<?php
class Triangle
{
  public $side1;
  public $side2;
  public $side3;


  function __construct($side_one, $side_two, $side_three)
  {
    $this->side1 = $side_one;
    $this->side2 = $side_two;
    $this->side3 = $side_three;
  }

  function type()
  {
    $x = $this->side1;
    $y = $this->side2;
    $z = $this->side3;

    if ($this->side1 === $this->side2 && $this->side1 === $this->side3)
    {return "This is an equalateral triangle.";}

    elseif($this->side1 === $this->side2 || $this->side2 === $this->side3 || $this->side1 === $this->side3)

    {return "This is an isosceles Triangle";}
    else{
      if (($x + $y) > $z && ($x + $z) > $y && ($z + $y) > $x ){return "This is an scalene Triangle";}
        else{return "This is not a Triangle";}


    }
  }

}
$testTriangle = new Triangle(30,30,2);

print_r($testTriangle);
echo $testTriangle->type();
?>
