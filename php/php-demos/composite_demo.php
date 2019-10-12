<?php

interface canBeRead {
public function readMe($text);
}
abstract class OnTheShelf {
    protected $name;
    abstract function getSize();
    public static function doSomething()
    {
        return "I do nothing";
    }
}
interface Burnable {
    public function setBurnRate();
}
class Pottery extends OnTheShelf {
  
    public function getSize(){
    }

}
abstract class BooksOnTheShelf extends OnTheShelf implements Burnable{
    abstract function getBookInfo($previousBook);
    abstract function getBookCount();
    abstract function setBookCount($new_count);
    abstract function addBook($oneBook);
    abstract function removeBook($oneBook);
}

abstract class OtherStuff extends OnTheShelf {
    private $color;
    function getSize()
    {
        return false;
    }

}
class Rock implements Burnable {

    public function setBurnRate()
    {
        echo "I am a rock and therefore probably wont burn, unless you superheat me in a volcano";
    }

}
class Book extends BooksOnTheShelf implements canBeRead {
    private $title;
    private $author;
    function __construct($title, $author) {
      $this->title = $title;
      $this->author = $author;
    }
    public function getName(){
        
      return $this->name;
    }
    public function setBurnRate(){
        echo "I burn quickly because I am made of paper";
    }
    public function setName($newName){
      return $this->name = $newName;
    }
    public function getSize()
    {
        return false;
    }
    function getBookInfo($bookToGet) {
      if (1 == $bookToGet) {
        return $this->title." by ".$this->author;
      } else {
        return FALSE;
      }
    }
    function getBookCount() {
      return 1;
    }
    function setBookCount($newCount) {
      return FALSE;
    }
    function addBook($oneBook) {
      return FALSE;
    }
    function removeBook($oneBook) {
      return FALSE;
    }
    function readMe($text){
        return $text;
    }
    public static function doSomething(){
        return "read me seymour";
    }
}

class BookCollection extends BooksOnTheShelf {
    private $oneBooks = array();
    private $bookCount;
    public function setBurnRate() {

    }
    public function __construct() {
      $this->setBookCount(0);
    }
    public function getSize()
    {
        return false;
    }
    public function getBookCount() {
      return $this->bookCount;
    }
    public function setBookCount($newCount) {
      $this->bookCount = $newCount;
    }
    public function getBookInfo($bookToGet) {   
      if ($bookToGet <= $this->bookCount) {
        return $this->oneBooks[$bookToGet]->getBookInfo(1);
      } else {
        return FALSE;
      }
    }
    public function addBook($oneBook) {
      $this->setBookCount($this->getBookCount() + 1);
      $this->oneBooks[$this->getBookCount()] = $oneBook;
      return $this->getBookCount();
    }
    public function removeBook($oneBook) {
      $counter = 0;
      while (++$counter <= $this->getBookCount()) {
        if ($oneBook->getBookInfo(1) == 
          $this->oneBooks[$counter]->getBookInfo(1)) {
          for ($x = $counter; $x < $this->getBookCount(); $x++) {
            $this->oneBooks[$x] = $this->oneBooks[$x + 1];
          }
          $this->setBookCount($this->getBookCount() - 1);
        }
      }
      return $this->getBookCount();
    }
}
$rule = "\n===================================================\n";
  writeln("BEGIN TESTING COMPOSITE PATTERN");
  writeln(''. $rule);
  writeln('I am abstract class OnTheShelf and: ' . OnTheShelf::doSomething());
  writeln('I am a Book class and: ' . Book::doSomething());
  $firstBook = new Book('Core PHP Programming, Third Edition', 'Atkinson and Suraski');
  $firstBook->setName("Snort me");
  writeln('(after creating first book) oneBook info: ');
  writeln($firstBook->getBookInfo(1));
  writeln("and the book name is:");
  writeln($firstBook->getName());
  writeln(''. $rule);
 
  $secondBook = new Book('PHP Bible', 'Converse and Park');
  writeln('(after creating second book) oneBook info: ');
  writeln($secondBook->getBookInfo(1));
  writeln('');

  $thirdBook = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
  writeln('(after creating third book) oneBook info: ');
  writeln($thirdBook->getBookInfo(1));
  writeln('');

  $books = new BookCollection();

  $booksCount = $books->addBook($firstBook);
  writeln('(after adding firstBook to books) BookCollection info : ');
  writeln($books->getBookInfo($booksCount));
  writeln('');

  $booksCount = $books->addBook($secondBook);
  writeln('(after adding secondBook to books) BookCollection info : ');
  writeln($books->getBookInfo($booksCount));
  writeln('');

  $booksCount = $books->addBook($thirdBook);
  writeln('(after adding thirdBook to books) BookCollection info : ');
  writeln($books->getBookInfo($booksCount));
  writeln('');

  $booksCount = $books->removeBook($firstBook);
  writeln('(after removing firstBook from books) BookCollection count : ');
  writeln($books->getBookCount());
  writeln('');
 
  writeln('doSomething is a static function  in the OnTheShelf abstract class, I am checking that it will work here ');
  writeln($books::doSomething());
  writeln('');

  writeln('(after removing firstBook from books) BookCollection info 1 : ');
  writeln($books->getBookInfo(1));
  writeln('');
 
  writeln('(after removing firstBook from books) BookCollection info 2 : ');
  writeln($books->getBookInfo(2));
  writeln('');

 $rock = new Rock();
  $rock->setBurnRate();
  writeln('------');
  $secondBook->setBurnRate();


  writeln('END TESTING COMPOSITE PATTERN');
 
  function writeln($line_in) {
    echo $line_in."\n";
  }

?>
