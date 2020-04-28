<?php


class Assignment
{
    private $id;
    private $name;

    # GETTERS & SETTERS

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}
}