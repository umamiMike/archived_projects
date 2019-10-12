
<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */


    require_once "src/Client.php";
    require_once "src/Stylist.php";

    // 
    // $server = 'mysql:host=localhost;port=80;dbname=hair_salon_test';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
      {
          Stylist::deleteAll();
          Client::deleteAll();
      }

    function test_stylist_getName()
    {
         //Arrange
         $style =  "Thai";
         $test_stylist = new Stylist($style);
         //Act
         $result = $test_stylist->getName();
         //Assert
         $this->assertEquals($style, $result);
    }//end test

    function test_stylist_getId()
    {
         //Arrange
         $style = "Thai";
         $id = 1;
         $test_stylist = new Stylist($style, $id);
         //Act
         $result = $test_stylist->getId();
         //Assert
         $this->assertEquals(true, is_numeric($result));
    }

    function test_stylist_save()
    {
         //Arrange
         $style = "Thai";
         $test_stylist = new Stylist($style);

         //Act
         $test_stylist->save();

         //Assert
         $result = Stylist::getAll();
         $this->assertEquals($test_stylist,$result[0]);
    }

    function test_stylist_getAll()
    {
        //Arrange
        $style = "Thai";
        $id = null;
        $test_stylist = new Stylist($style, $id);
        $test_stylist->save();

        $name= "pok pok";
        $stylist_id = $test_stylist->getId();
        $test_client = new Client($name, $stylist_id, $id);
        $test_client->save();

        $name2= "New Thai Blues";
        $test_client2 = new Client($name2, $stylist_id, $id);
        $test_client2->save();

        //Act
        $result = Client::getAll();

        //Assert
        $this->assertEquals([$test_client, $test_client2], $result);
    }

    function test_stylist_find()
    {
        //Arrange
        $stylist1 = new Stylist("Thai");
        $stylist1->save();
        $stylist2 = new Stylist("Dogfood");
        $stylist2->save();

        //Act
        $id = $stylist1->getId();
        $result = Stylist::find($id);

        //Assert
        $this->assertEquals($stylist1, $result);
    }

    function test_stylist_update()
    {

        //Arrange
        $style = "Thai";
        $id = null;
        $test_stylist = new Stylist($style, $id);
        $test_stylist->save();

        $new_style = "Asian";

        //Act
        $test_stylist->update($new_style);

        //Assert
        $this->assertEquals("Asian", $test_stylist->getName());

     }

     function test_stylist_delete()
     {

         $style = "Thai";
         $test_stylist = new Stylist($style);
         $test_stylist->save();

         $style2 = "burgers";
         $test_stylist2 = new Stylist($style2);
         $test_stylist2->save();

         $name = "Pok Pok";
         $category_id = $test_stylist->getId();
         $test_client = new Client($name, $category_id);
         $test_client->save();

         $name2 = "Dicks";
         $category_id2 = $test_stylist2->getId();
         $test_client2 = new Client($name2, $category_id2);
         $test_client2->save();


         //Act
         $test_stylist->delete();

         //Assert
         $this->assertEquals([$test_client2],Client::getAll());

     }

}
?>
