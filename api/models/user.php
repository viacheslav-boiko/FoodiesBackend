<?php


class User
{
    private $id;
    private $name;
    private $picture;
    private $locale;
    private $email;

    # GETTERS & SETTERS

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}

    public function getPicture(){return $this->picture;}
    public function setPicture($picture){$this->picture = $picture;}

    public function getLocale(){return $this->locale;}
    public function setLocale($locale){$this->locale = $locale;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){$this->email = $email;}
}