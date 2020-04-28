<?php


class Ingredient
{
    private $id;
    private $name;
    private $amount;
    private $unit;

    # GETTERS & SETTERS

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}

    public function getAmount(){return $this->amount;}
    public function setAmount($amount){$this->amount = $amount;}

    public function getUnit(){return $this->unit;}
    public function setUnit($unit){$this->unit = $unit;}
}