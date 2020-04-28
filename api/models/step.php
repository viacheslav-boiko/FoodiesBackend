<?php

class Step
{
    private $num;
    private $image;
    private $description;

    # GETTERS & SETTERS

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}

    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function getNum(){return $this->num;}
    public function setNum($num){$this->num = $num;}
}