<?php

    class Player
    {
        private $name;
        private $age;
        private $image;
        private $email;


        function __construct($name, $age, $image, $email)
        {
            $this->name = $name;
            $this->age = $age;
            $this->image = $image;
            $this->email = $email;
        }

        function getName()
        {
            return $this->name;
        }

        function getAge()
        {
            return $this->age;
        }

        function getImage()
        {
            return $this->image;
        }

        function getEmail()
        {
            return $this->email;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setAge($new_age)
        {
            $this->age = $new_age;
        }

        function setImage($new_image)
        {
            $this->image = $new_image;
        }

        function setEmail($new_email)
        {
            $this->email = $new_email;
        }

        function save()
        {
            array_push($_SESSION['list_of_players'], $this);
        }

        static function getAll() {

            return $_SESSION['list_of_players'];
        }

        static function deleteAll() {

            $_SESSION['list_of_players'] = array();
        }

    }


 ?>
