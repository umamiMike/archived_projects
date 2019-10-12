<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Book.php";
    require_once "src/Copy.php";

    $server = 'mysql:host=localhost;dbname=library_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class CopyTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Book::deleteAll();
            Copy::deleteAll();
        }

        function testGetBookId()
        {
            $book_id = 1;
            $test_copy = new Copy($book_id);

            $result = $test_copy->getBookId();

            $this->assertEquals($book_id, $result);
        }

        function testGetId()
        {
            $book_id = 1;
            $test_copy = new Copy($book_id);

            $result = $test_copy->getId();

            $this->assertEquals(null, $result);
        }

        function testGetAll()
        {
            $book_id = 1;
            $test_copy = new Copy($book_id);
            $test_copy->save();

            $book_id2 = 2;
            $test_copy2 = new Copy($book_id2);
            $test_copy2->save();

            $result = Copy::getAll();

            $this->assertEquals([$test_copy, $test_copy2], $result);
        }

        function testSave()
        {
            $book_id = 1;
            $test_copy = new Copy($book_id);
            $test_copy->save();

            $result = Copy::getAll();

            $this->assertEquals($test_copy, $result[0]);
        }

        function testFind()
        {
            $book_id = 1;
            $test_copy = new Copy($book_id);
            $test_copy->save();

            $book_id2 = 2;
            $test_copy2 = new Copy($book_id2);
            $test_copy2->save();

            $result = Copy::find($test_copy->getId());

            $this->assertEquals($test_copy, $result);
        }

        function testDelete()
        {
            $book_id = 1;
            $test_copy = new Copy($book_id);
            $test_copy->save();

            $book_id2 = 2;
            $test_copy2 = new Copy($book_id2);
            $test_copy2->save();

            $test_copy->delete();

            $this->assertEquals([$test_copy2], Copy::getAll());
        }

        function testGetBook()
        {
            $title = "Carrie";
            $test_book = new Book($title);
            $test_book->save();

            $book_id = $test_book->getId();;
            $test_copy = new Copy($book_id);
            $test_copy->save();

            $result = $test_copy->getBook();

            $this->assertEquals($test_book, $result);
        }

    }
?>
