<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Author.php";
    require_once "src/Book.php";

    $server = 'mysql:host=localhost;dbname=library_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AuthorTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Author::deleteAll();
            Book::deleteAll();
        }

        function testGetName()
        {
            $name = "Stephen King";
            $test_author = new Author($name);

            $result = $test_author->getName();

            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            $name = "Stephen King";
            $test_author = new Book($name);

            $result = $test_author->getId();

            $this->assertEquals(null, $result);
        }

        function testGetAll()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();

            $name2 = "Neal Stephenson";
            $test_author2 = new Author($name2);
            $test_author2->save();

            $result = Author::getAll();

            $this->assertEquals([$test_author2, $test_author], $result);
        }

        function testSave()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();

            $result = Author::getAll();

            $this->assertEquals($test_author, $result[0]);
        }

        function testFind()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();

            $name2 = "Neal Stephenson";
            $test_author2 = new Author($name2);
            $test_author2->save();

            $result = Author::find($test_author->getId());

            $this->assertEquals($result,$test_author);
        }

        function testUpdate()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();

            $new_name = "Neal Stephenson";
            $test_author->update($new_name);

            $this->assertEquals($new_name,$test_author->getName());
        }

        function testDelete()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();

            $name2 = "Neal Stephenson";
            $test_author2 = new Author($name2);
            $test_author2->save();

            $test_author->delete();

            $this->assertEquals([$test_author2], Author::getAll());
        }

        function testAddBook()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();


            $title = "Carrie";
            $test_book = new Book($title);
            $test_book->save();
            $test_author->addBook($test_book);

            $this->assertEquals($test_author->getBooks(),[$test_book]);
        }

        function testGetBooks()
        {
            $name = "Stephen King";
            $test_author = new Author($name);
            $test_author->save();


            $title = "Carrie";
            $test_book = new Book($title);
            $test_book->save();
            $test_author->addBook($test_book);

            $title2 = "Misery";
            $test_book2 = new Book($title2);
            $test_book2->save();
            $test_author->addBook($test_book2);

            $this->assertEquals([$test_book,$test_book2], $test_author->getBooks());


        }
    }
?>
