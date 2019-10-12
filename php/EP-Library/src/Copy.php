<?php

    class Copy
    {
        private $book_id;
        private $id;

        function __construct($book_id, $id = null)
        {
            $this->book_id = $book_id;
            $this->id = $id;
        }

        function getBookId()
        {
            return $this->book_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO copies_t (book_id) VALUES ({$this->getBookId()});");
            $this->id=$GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM copies_t WHERE id = {$this->getId()};");
            //Delete from checkouts?
        }


        //Returns the book object this copy is associated with
        function getBook()
        {
            $query = $GLOBALS['DB']->query("SELECT * FROM books_t WHERE id = {$this->getBookId()};");
            $returned_book = $query->fetchAll(PDO::FETCH_ASSOC);

            $title = $returned_book[0]['title'];
            $id = $returned_book[0]['id'];
            $new_book = new Book($title, $id);
            return $new_book;
        }

        static function getAll()
        {
            $returned_copies = $GLOBALS['DB']->query("SELECT * FROM copies_t;");
            $copies = array();
            foreach($returned_copies as $copy) {
                $book_id = $copy['book_id'];
                $id = $copy['id'];
                $new_copy = new Copy($book_id, $id);
                array_push($copies, $new_copy);
            }
            return $copies;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM copies_t;");
        }

        static function find($search_id)
        {
            $found = null;
            $copies = Copy::getAll();
            foreach($copies as $copy) {
                $copy_id = $copy->getId();
                if($copy_id == $search_id) {
                    $found = $copy;
                }
            }
            return $found;
        }

        //No need for update because you would never change the book_id
    }




 ?>
