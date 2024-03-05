<?php

class usuarios {


private $user;
private $id;
private $rol;


public function __construct(){}

public function setId($id){
$this -> id= $id;
}

public function setUser($user){

    $this -> user = $user;
}

public function setRol($rol){
    $this -> rol= $rol;
    }
    


    public function getRol(){
        return $this->rol;
        
        }


public function getId(){
return $this->id;

}

public function getUser(){
    return $this->user;
    
    }
    


}