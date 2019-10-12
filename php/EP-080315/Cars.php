<?php

  class Car
  {
    private $make_model;
    private $price;
    private $miles;
    private $image_path;

      public function __construct($make_model = "defaultCar", $price = 0.00, $miles = 0,$image_path="http://www.clipartbest.com/cliparts/ace/o9X/aceo9Xzgi.jpeg"){

        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->image_path = $image_path;

      }// end construct
//getters
      function getMakeModel() {
        return $this->make_model;
      }

      function getPrice() {
        return $this->price;
      }

      function getMiles() {
        return $this->miles;
      }

      function getImagePath(){return $this->image_path;}
//setters
      function setMakeModel ($new_make_model){$this->make_model = $new_make_model;}

      function setPrice($new_price){$this->price = $new_price;}
      function setMiles($new_miles){$this->miles = $new_miles;}


      function setImagePath($new_image_path){$this->image_path = $new_image_path;}


  }// end car class

  $car1 = new Car("miata",5.99,23, "http://www.clipartbest.com/cliparts/ace/o9X/aceo9Xzgi.jpeg");
  $car2 = new Car("Accord", 900, 10000,"http://www.wellclean.com/wp-content/themes/artgallery_3.0/images/car3.png");
  $car3 = new Car("Civic", 888, 9000);
  $car4 = new Car("Volvo",666.66,"666,666.00");

  $cars = array($car1,$car2,$car3,$car4);
  $cars_matching_search = array();
  foreach ($cars as $car) {
    if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
      array_push($cars_matching_search, $car);
    }
  }


//echo $car1->make_model;

//print_r($car1);
//var_dump($car1);
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Your Car Dealership's Homepage</title>
  </head>
  <body>
    <h1>Your Car Dealership</h1>
    <ul>
      <?php
        if (!empty($cars_matching_search)){
        foreach($cars_matching_search as $car){
            echo "<li>". $car->getMakeModel() . "</li>";
            echo "<ul>";
              echo "<li>$" . $car->getPrice() . "</li>";
              echo "<li> Miles: " . $car->getMiles() . "</li>";
              echo "<li><img src=". $car->getImagePath() . "></li>";

            echo "</ul>";
          }//end for each

      }//end if
      else{echo "No Cars match your criteria";}



      ?>
    </ul>
  </body>

</html>
