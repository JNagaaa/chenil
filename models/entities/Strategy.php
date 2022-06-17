<?php
class Cat extends Animal {
    public function __construct() {
        parent::strategy(new Meow(), new CatSize(), new CatLocation(), false, false, false, false, false);
    }
}

class Dog extends Animal {
    public function __construct() {
        parent::strategy(new Bark(), new DogSize(), new DogLocation(), false, false, false, false, false);
    }
}

class Bird extends Animal {
    public function __construct() {
        parent::strategy(new Twitter(), new BirdSize(), new BirdLocation(), false, false, false, false, false);
    }
}



interface SpeakBehaviorInterface {
    public function speak();
}

class Meow implements SpeakBehaviorInterface {
    public function speak () {
        echo "Pour s'exprimer, le chat miaule. ";
        }
}

class Bark implements SpeakBehaviorInterface  {
    public function speak() {
        echo "Pour s'exprimer, le chien aboie. ";
    }
}

class Twitter implements SpeakBehaviorInterface {
    public function speak() {
        echo "Pour s'exprimer, l'oiseau gazouille. ";
    }
}



interface SizeInterface {
    public function size();
}

class CatSize implements SizeInterface {
    public function size(){
    echo "Un chat mesure en moyenne entre 23 et 25 cm. ";
    }
}

class DogSize implements SizeInterface {
    public function size(){
    echo "Un chien mesure en moyenne entre 15cm et 1,10m (tu parles d'une moyenne...). ";
    }
}

class BirdSize implements SizeInterface {
    public function size(){ 
    echo "Un oiseau peut mesurer de 5cm (colibri d'Elena) à 2,75m (autruche d'Afrique)! ";
    }
}



interface LocationInterface {
    public function location();
}

class CatLocation implements LocationInterface {
    public function location() {
    echo "Nous gardons les chats dans la zone A du bâtiment.";
    }
}

class DogLocation implements LocationInterface {
    public function location() {
    echo "Nous gardons les chiens dans la zone B du bâtiment.";
    }
} 

class BirdLocation implements LocationInterface {
    public function location() {
    echo "Nous gardons les oiseaux dans la zone A du bâtiment, pour nourrir les chats. D'une pierre deux coups!";
    }
}

?>