<?php
var_dump($_POST);
class AnimalController extends Controller {
    public function index () {
        $animals = Animal::all();
        include('../views/animals/list.php');
    }
    
    public function show ($id) {
        $animal = Animal::find($id);
        include('../views/animals/one.php');
    }
    
    public function create () {
        $people = Person::all();
        $sejours = Sejour::all();
        include('../views/animals/create.php');
    }
    
    public function store ($data) {
       $personToStore = Person::find($data['person_id']);
       $personID = $personToStore->id;
       $nom = $data['nom'] ? $data['nom'] : false;
       $sexe = $data['sexe'] ? $data['sexe'] : false;
       $sterilise = isset($data['sterilise']) ? $data['sterilise'] : false;
       $puce = $data['puce'] ? $data['puce'] : false;
       $animal = new Animal(0, $nom, $sexe, $sterilise, $puce, $personID);
       $animal->save();
       return $this->index();
    }
    
    public function edit ($id) {
        $animal = Animal::find($id);
        $people = Person::all();
        include('../views/animals/edit.php');
    }
    
    public function update($id, $data) {
        $animal = Animal::find($id);
        if (!$animal) {
            return false;
        }
        
        
        $personToUpdate = Person::find($data['person_id']);
        $personToUpdateID = $personToUpdate->id;
        $animal->person = $personToUpdateID;
        $animal->nom = $data['nom'] ? $data['nom'] : $animal->nom;
        $animal->sexe = $data['sexe'] ? $data['sexe'] : $animal->sexe;
        $animal->sterilise = isset($data['sterilise']) ? $data['sterilise'] : 0;
        $animal->puce = $data['puce'] ? $data['puce'] : $animal->puce;



        $animal->save();
        return $this->index();
    }
    
    public function destroy ($id) {
        $animal = Animal::find($id);
        if (!$animal) {
            return false;
        }
        $animal->delete();
        return $this->index();
    }
}