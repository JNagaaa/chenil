<?php

class Person extends Entity {
    protected $id;
    protected $nom;
    protected $prenom;
    protected $naissance;
    protected $mail;
    protected $telephone;
    protected $animals;
    protected static $dao_name = "PersonDAO";
    
    public function __construct ($id, $nom, $prenom, $naissance, $mail, $telephone, $animals = false) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->naissance = $naissance;
        $this->mail = $mail;
        $this->telephone = $telephone;
        $this->animals = $animals;
        parent::__construct(self::$dao_name);
    }
    
    public function __toString () {
        return $this->nom;
        return $this->prenom;
        return $this->mail;
    }
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "animals") {
                return $this->animals();
            }
            return $this->$prop;
        }
    }
    
    protected function animals () {
        if ($this->animals) {
            return $this->animals;
        }
        $this->animals = Animal::where('person_id', $this->id);
        return $this->animals;
    }
}