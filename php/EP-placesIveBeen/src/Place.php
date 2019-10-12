<?php
    class Place {

      private $img_path;
      private $place;
      private $desc;

      function __construct($img_path,$place,$desc)
      {
        $this->img_path = $img_path;
        $this->place = $place;
        $this->desc = $desc;
      }

      function setImgPath($new_img_path)
      {
        $this->img_path = $new_img_path;
      }

      function setPlace($new_place)
      {
        $this->place = $place;
      }

      function setDesc($new_desc)
      {
        $this->desc = $new_desc;
      }

      function getImgPath()
      {
        return $this->img_path;

      }

      function getPlace()
      {
        return $this->place;
      }

      function getDesc()
      {
        return $this->desc;
      }

      function save()
      {
          array_push($_SESSION['list_of_places'], $this);
      }

      static function getAll()
      {
          return $_SESSION['list_of_places'];
      }

      static function deleteAll()
      {
          $_SESSION['list_of_places'] = array();
      }

    }

?>
