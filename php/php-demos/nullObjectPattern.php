<?php
namespace Model;

interface UserInterface
{
    public function setId();
    public function getId();
     
    public function setName();
    public function getName();
    
    public function setEmail();
    public function getEmail();
}

namespace Model;

class User implements UserInterface
{
    private ;
    private ;
    private ;

    public function __construct(, ) {
        ->setName();
        ->setEmail();
    }
    
    public function setId() {
        if (->id !== null) {
            throw new BadMethodCallException(
                "The ID for this user has been set already.");
        }
        if (!is_int() ||  < 1) {
            throw new InvalidArgumentException(
              "The ID for this user is invalid.");
        }
        ->id = ;
        return ;
    }
    
    public function getId() {
        return ->id;
    }
    
    public function setName() {
        if (strlen() < 2 || strlen() > 30) {
            throw new InvalidArgumentException(
                "The user name is invalid.");
        }
        ->name = ;
        return ;
    }
    
    public function getName() {
        return ->name;
    }
    
    public function setEmail() {
        if (!filter_var(, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                "The user email is invalid.");
        }
        ->email = ;
        return ;
    }
    
    public function getEmail() {
        return ->email;
    }
}

