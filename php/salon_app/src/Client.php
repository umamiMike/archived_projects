<?php

class Client {

    private $id;
    private $name;
    private $stylist_id;

        function __construct($name, $stylist_id, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }
        function getStylistId()
        {
            return $this->stylist_id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name) VALUES ('{$this->getName()}',{$this->getStylistId()})");
            $this->id= $GLOBALS['DB']->lastInsertId();
        }

        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE client_id = {$this->getId()};");
        }

        function getStylists()
        {
            $stylists = array();
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE client_id = {$this->getId()};");
            foreach($returned_stylists as $stylist) {
                $description = $stylist['description'];
                $id = $stylist['id'];
                $client_id = $stylist['client_id'];
                $new_stylist = new stylist($description, $id, $client_id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $id = $client['id'];
                $new_client = new client($name, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                  $found_client = $client;
                }
            }
            return $found_client;
        }
    }
?>
