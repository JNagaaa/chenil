<?php

class Animal extends Entity {
    protected $speakBehavior;
    protected $size;
    protected $location;

    protected $id;
    protected $nom;
    protected $sexe;
    protected $sterilise;
    protected $puce;
    protected $type;
    protected $person;
    protected $sejours;
    protected static $dao_name = "AnimalDAO";
    
    public function __construct ($id, $nom, $sexe, $sterilise, $puce, $type, $person, $sejours = false) {
        $this->id = $id;
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->sterilise = $sterilise;
        $this->puce = $puce;
        $this->type = $type;
        $this->person = $person;
        $this->sejours = $sejours;
        parent::__construct(self::$dao_name);
    }

    public function strategy ($speakBehavior, $size, $location){
        $this->speakBehavior = $speakBehavior;
        $this->size = $size;
        $this->location = $location;
    }

    
    public function __toString () {
        return $this->nom. $this->sexe. $this->puce." (Propriétaire: ". $this->person .")";
    }
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "person") {
                return Person::find($this->person);
            }
            if ($prop == "sejours"){
                return Sejour::where('animal_id', $this->id);
            }
            
            return $this->$prop;
        }
    }

    public function speak () {
        $this->speakBehavior->speak();
    }
    
     public function size () {
        $this->size->size();
    }
    
    public function location () {
        $this->location->location();
    }
}