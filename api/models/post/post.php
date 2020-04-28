<?php

define("POST_BANDWIDTH", 5);

class Post
{

    private $id;
    private $title;
    private $cooktime;
    private $img;
    private $description;
    private $pubtime;
    private $shares;
    private $likes;
    private $likedByUser;
    private $proteins;
    private $lipids;
    private $carbohydrates;
    private $calorific;

    private $user;
    private $cuisine;
    private $category;

    private $ingredients;
    private $assignments;
    private $steps;


    # GETTERS & SETTERS
    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getCooktime(){return $this->cooktime;}
    public function setCooktime($cooktime){$this->cooktime = $cooktime;}

    public function getImg(){return $this->img;}
    public function setImg($img){$this->img = $img;}

    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function getPubtime(){return $this->pubtime;}
    public function setPubtime($pubtime){$this->pubtime = $pubtime;}

    public function getShares(){return $this->shares;}
    public function setShares($shares){$this->shares = $shares;}

    public function getProteins(){return $this->proteins;}
    public function setProteins($proteins){$this->proteins = $proteins;}

    public function getLikes(){return $this->likes;}
    public function setLikes($likes){$this->likes = $likes;}

    public function getLikedByUser(){return $this->likedByUser;}
    public function setLikedByUser($likedByUser){$this->likedByUser = $likedByUser;}

    public function getLipids(){return $this->lipids;}
    public function setLipids($lipids){$this->lipids = $lipids;}

    public function getCarbohydrates(){return $this->carbohydrates;}
    public function setCarbohydrates($carbohydrates){$this->carbohydrates = $carbohydrates;}

    public function getCalorific(){return $this->calorific;}
    public function setCalorific($calorific){$this->calorific = $calorific;}

    public function getUser(){return $this->user;}
    public function setUser($user){$this->user = $user;}

    public function getCuisine(){return $this->cuisine;}
    public function setCuisine($cuisine){$this->cuisine = $cuisine;}

    public function getCategory(){return $this->category;}
    public function setCategory($category){$this->category = $category;}

    public function getIngredients(){return $this->ingredients;}
    public function setIngredients($ingredients){$this->ingredients = $ingredients;}

    public function getAssignments(){return $this->assignments;}
    public function setAssignments($assignments){$this->assignments = $assignments;}

    public function getSteps(){return $this->steps;}
    public function setSteps($steps){$this->steps = $steps;}
}