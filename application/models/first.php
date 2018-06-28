<?php

class First extends CI_Model {

    public $hello;
    public function sayHelloSergy()
	{
       $this->hello = "hello Sergy";
       $a = $this->hello;
       return $a;
    }
    public function sayHelloIvan()
	{
       $this->hello = "hello Ivan";
       $b = $this->hello;
       return $b;
	}

}

?>