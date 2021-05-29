<?php
class Animal {
    //properties
  public $Name;
  public $Color;
  public $Gender;
  public $Weight;
  
  //method
  function __construct($name)
  {
    $this->Name=$name;
  }
  function create_new($name){
    return new Animal($name);
  }
}


?>