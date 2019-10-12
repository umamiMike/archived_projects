<?php

    class Author
    {
        private $name;
        private $id;

        function __construct($name, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO authors_t (name) VALUES ('{$this->getName()}');");
            $this->id=$GLOBALS['DB']->lastInsertId();
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE authors_t SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM authors_t WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM authors_books_t WHERE author_id = {$this->getId()};");
        }

        function addBook($book)
        {
            $GLOBALS['DB']->exec("INSERT INTO authors_books_t (author_id, book_id) VALUES ({$this->getId()},{$book->getId()});");
        }

        function getBooks()
        {
            $returned_books = $GLOBALS['DB']->query("SELECT books_t.* FROM authors_t JOIN authors_books_t ON (authors_t.id = authors_books_t.author_id) JOIN books_t ON (authors_books_t.book_id = books_t.id) WHERE authors_t.id = {$this->getId()} ORDER BY books_t.title;");

            $books = array();
            foreach($returned_books as $book){
                $title = $book['title'];
                $id = $book['id'];
                $new_book = new Book($title,$id);
                array_push($books, $new_book);

            }//end foreach
            return $books;
        }

        static function getAll()
        {
            $returned_authors = $GLOBALS['DB']->query("SELECT * FROM authors_t ORDER BY name;");
            $authors = array();
            foreach($returned_authors as $author) {
                $name = $author['name'];
                $id = $author['id'];
                $new_author = new Author($name, $id);
                array_push($authors, $new_author);
            }
            return $authors;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM authors_t;");
        }

        static function find($search_id)
        {
            $found = null;
            $authors = Author::getAll();
            foreach($authors as $author){
                $author_id = $author->getId();
                if($author_id == $search_id){
                    $found = $author;
                }

            }//end foreach
            return $found;
        }
    }

?>
