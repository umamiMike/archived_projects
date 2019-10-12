<?php

class Parcel{

  private $length;
  private $width;
  private $height;
  private $weight;

    function __construct($parcel_length,$parcel_width,$parcel_height,$parcel_weight){
      $this->length = $parcel_length;
      $this->width = $parcel_width;
      $this->height = $parcel_height;
      $this->weight = $parcel_weight;

    }

    function getLength(){return $this->length;}
    function getWidth(){return $this->width;}
    function getHeight(){return $this->height;}
    function getWeight(){return $this->weight;}


    function setLength($l){$this->length = $l;}
    function setWidth($w){$this->width = $w;}
    function setHeight($h){$this->height = $h;}
    function setWeight($wh){$this->weight = $wh;}


    function volume(){return $this->length * $this->height * $this->width;}

    function costToShip() {
      $shipping_type = $_GET["shipping"];
      $shipping_type_cost = 0;
      $shipping_range_by_volume = array(10,40,60); //for easy resetting of volume cost
      if ($shipping_type === "Regular") {
        $shipping_type_cost = 5.00;
      } else if ($shipping_type === "SecondDay") {
        $shipping_type_cost = 10.00;
      }else {
        $shipping_type_cost = 20.00;
      }

      if($this->volume() < 50) {
        return $shipping_type_cost = $shipping_type_cost + $shipping_range_by_volume[0];
      }
      else if ($this->volume() >= 50 && $this->volume() < 100){

      return  $shipping_type_cost = $shipping_type_cost + $shipping_range_by_volume[1];
      }
      else {return $shipping_type_cost = $shipping_type_cost + $shipping_range_by_volume[2]; }

}


}

  $a = new Parcel($_GET["length"],$_GET["width"],$_GET["height"],$_GET["weight"]);




?>

<!DOCTYPE html>
<html>

<head>
  <title></title>

</head>
<body>
  <ul>
<?php
$theString = "<li> The Parcel Length is: ";
$theString .= $a->getLength();
$theString .= "</li>";
$theString .= "<li> The Parcel Width is: ";
$theString .= $a->getWidth();
$theString .= "</li>";
$theString .= "<li>The Parcel Height is: ";
$theString .= $a->getHeight();
$theString .= "</li>";
$theString .= "<li> The Parcel Weight is: ";
$theString .= $a->getWeight();
$theString .= "</li>";
$theString .= "<li> The Parcel Volume is: ";
$theString .= $a->volume();
$theString .= "</li>";
$theString .= "<li> The Cost to Ship is: ";
$theString .= $a->costToShip();
$theString .= "</li>";
echo $theString;

?>
</ul>
</body>
</html>
