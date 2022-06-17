<?php

class Sejour extends Entity {
    
    protected $id;
    protected $date;
    protected $animal;
    protected $animals;
    protected static $dao_name = "SejourDAO";
    
    public function __construct ($id, $date, $animal, $animals = false) {
        $this->id = $id;
        $this->date = $date;
        $this->animal = $animal;
        $this->animals = $animals;
        parent::__construct(self::$dao_name);
    }
    
    public function __toString () {
        
    }
    
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "animals") {
                return Animal::where('person_id', $this->id);
            }else if ($prop == 'animal') {
                return Animal::find($this->animal);
            }
            return $this->$prop;
        }
    }
}
