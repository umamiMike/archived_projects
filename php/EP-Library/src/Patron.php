<?php

  class Patron
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
          $this->title = $new_name;
      }

      function getId()
      {
          return $this->id;
      }

      function save()
      {
          $GLOBALS['DB']->exec("INSERT INTO patrons_t (name) VALUES ('{$this->getName()}');");
          $this->id=$GLOBALS['DB']->lastInsertId();
      }

      function update($new_name)
      {
          $GLOBALS['DB']->exec("UPDATE patrons_t SET name = '{$new_name}' WHERE id = {$this->getId()};");
          $this->name = $new_name;
      }

      function delete()
      {
          $GLOBALS['DB']->exec("DELETE FROM patrons_t WHERE id = {$this->getId()};");
      }

      function addCheckout()
      {
          //Will add a new checkout for the patron
          //Need to add after building checkout
      }

      function getCheckoutHistory()
      {
          //Will list all checkouts in this patrons history
          //Need to add after building checkout
      }

      function getCurrentCheckouts()
      {
          //Will list all books currently checked out by this patron
          //Need to add after building checkout
      }

      static function getAll()
      {
          $returned_patrons = $GLOBALS['DB']->query("SELECT * FROM patrons_t ORDER BY name;");
          $patrons = array();
          foreach($returned_patrons as $patron) {
              $name = $patron['name'];
              $id = $patron['id'];
              $new_book = new Patron($name, $id);
              array_push($patrons, $new_book);
          }
          return $patrons;
      }

      static function deleteAll()
      {
          $GLOBALS['DB']->exec("DELETE FROM patrons_t;");
      }

      static function find($search_id)
      {
          $found = null;
          $patrons = Patron::getAll();
          foreach($patrons as $patron){
              $patron_id = $patron->getId();
              if($patron_id == $search_id){
                  $found = $patron;
              }

          }//end foreach
          return $found;
      }

  }
?>
