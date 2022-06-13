<?php

class Animal extends Entity {
    
    protected $id;
    protected $nom;
    protected $sexe;
    protected $sterilise;
    protected $puce;
    protected $person;
    protected $sejours;
    protected static $dao_name = "AnimalDAO";
    
    public function __construct ($id, $nom, $sexe, $sterilise, $puce, $person, $sejours = false) {
        $this->id = $id;
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->sterilise = $sterilise;
        $this->puce = $puce;
        $this->person = $person;
        $this->sejours = $sejours;
        parent::__construct(self::$dao_name);
    }
    
    public function __toString () {
        return $this->nom. $this->sexe. $this->sterilise. $this->puce." (Propriétaire: ". $this->person .")";
    }
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "person") {
                return $this->person();
            }
            return $this->$prop;
        }
    }

    public function __get2 ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "sejours") {
                return $this->sejours();
            }
            return $this->$prop;
        }
    }
    
    protected function sejours () {
        if ($this->sejours) {
            return $this->sejours;
        }
        $this->sejours = Sejour::where('animal_id', $this->id);
        return $this->sejours;
    }
    
    protected function person () {
        if($this->person instanceof Person) {
            return $this->person;
        }
        $this->person = Person::find($this->person);
        return $this->person;
    }
}


