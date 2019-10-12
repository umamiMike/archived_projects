
<?php


    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */


    require_once "src/Client.php";
    require_once "src/Stylist.php";

    // $server = 'mysql:host=localhost;port=80;dbname=hair_salon_test';
    // $username = 'root';
    // $password = 'root';
    // $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }//end function

        function test_client_save()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();
            $name = "Pok-Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            //Act
            $test_client->save();
            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function test_client_getAll()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            $test_client->save();

            $name2 = "Mai Thai";
            $category_id = $test_cuisine->getId();
            $test_client2 = new Client($name2, $category_id);
            $test_client2->save();
            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_client_deleteAll()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            $test_client->save();

            $name2 = "Mai Thai";
            $category_id = $test_cuisine->getId();
            $test_client2 = new Client($name2, $category_id);
            $test_client2->save();
            //Act
            Client::deleteAll();
            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_client_getId()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            $test_client->save();
            //Act
            $result = $test_client->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_client_getCategoryId()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            $test_client->save();
            //Act
            $result = $test_client->getCuisineId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_client_find()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $style2 = "asian fusion";
            $test_cuisine2 = new Client($style2);
            $test_cuisine2->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            $test_client->save();

            $name2 = "Mai Thai";
            $category_id2 = $test_cuisine2->getId();
            $test_client2 = new Client($name2, $category_id2);
            $test_client2->save();

            //Act
            $id = $test_client->getId();
            $result = Client::find($id);

            //Assert
            $this->assertEquals($test_client, $result);
        }

        function test_client_update()
        {

            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $cuisine_id = $test_cuisine->getId();
            $stars = 4;
            $website = "www.pokpokpdx.com";
            $phone = "503 232 1387";
            $tr = new Client($name, $cuisine_id, $stars, $website, $phone);
            $tr ->save();

            $new_name = "Pok Pok Noi";
            $new_cuisine_id = $test_cuisine->getId();
            $new_id =
            $new_stars = 7;
            $new_website = "balls";
            $new_phone ="503 555 5555";

            //Act
            $tr->updateClient($new_name,$tr->getCuisineId(), $tr->getID(),$new_stars, $new_website, $new_phone);

            //Assert
            $this->assertEquals(7, $tr->getStars(), "OH NO");

         }

        function test_client_delete()
        {

            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $test_client = new Client($name, $category_id);
            $test_client->save();
            $name2 = "Dicks";
            $category_id2 = $test_cuisine->getId();
            $test_client2 = new Client($name2, $category_id);
            $test_client2->save();


            //Act
            $test_client->delete();

            //Assert
            $this->assertEquals([$test_client2], Client::getAll());


        }

        //testing that when we feed the client a star number it returns
        function test_client_getStars()
        {
            //Arrange
            $style = "Thai";
            $test_cuisine = new Client($style);
            $test_cuisine->save();

            $name = "Pok Pok";
            $category_id = $test_cuisine->getId();
            $stars = 5;
            $test_client = new Client($name, $category_id,null,$stars);
            $test_client->save();
            $name2 = "Dicks";
            $stars2 = 3;
            $category_id2 = $test_cuisine->getId();
            $test_client2 = new Client($name2, $category_id,null,$stars2);
            $test_client2->save();

            //Act
            $result = Client::getAll();
            //Assert
            $this->assertEquals(5,$result[0]->getStars());

        }

    } //end class




?>
