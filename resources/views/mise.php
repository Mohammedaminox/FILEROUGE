<?php


interface Animal {
    public function makeSound();
}

class chat implements Animal{
    public function makeSound()
    {
        echo "miiiw";
    }
}
class chien implements Animal{
    public function makeSound()
    {
        echo "miiiw";
    }
}
function getSound(Animal $animal){
    $animal->makeSound();
}
$chat = new chat;
$chien = new chien;

getSound($chat);
getSound($chien);
$chat->makeSound();



class person {
    protected $name;
    protected $age;

    public function __construct($name , $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function Info(){
        echo "my name {$this->name} , age{$this->age}";
    }
}

class worker extends person{
    private $job;

    public function __construct($name , $age, $job)
    {
        parent::__construct($name, $age);
        $this->job = $job;
    }
    public function Info(){
        parent::Info();
        echo "my job is {$this->job}";
    }
}
$worker = new worker("hamid", 50 , "teache");
$worker->Info();










class vehicule {
    protected $name;
    protected $model;

    public function __construct($name, $model)
    {
        $this->name = $name;
        $this->model = $model;
    }

    public function info(){
        echo "name is {$this->name}";
        echo "model is {$this->model}";
    }
}

class Car extends vehicule{
    private $vitesse;

    public function __construct($name, $model,)
    {
        
    }
}