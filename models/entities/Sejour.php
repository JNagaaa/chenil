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
        return $this->date." (". $this->animal .")";
    }
    
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            if ($prop == "animals") {
                return $this->animals();
            }else if ($prop == 'animal') {
                return $this->animal();
            }
            return $this->$prop;
        }
    }

    protected function animal () {
        if($this->animal instanceof Animal) {
            return $this->animal;
        }
        $this->animal = Animal::find($this->animal);
        return $this->animal;
    }
    
    protected function animals () {
        if ($this->animals) {
            return $this->animals;
        }
        $this->animals = Animal::where('id', $this->id);
        return $this->animals;
    }
}
