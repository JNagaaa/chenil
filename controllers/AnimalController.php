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
       $person = $data['person_id'] ? Person::find($data['person_id']) : false;
       $nom = $data['nom'] ? $data['nom'] : false;
       $sexe = $data['sexe'] ? $data['sexe'] : false;
       if(!isset($data['sterilise'])){
        $sterilise = 0;
       }
       $puce = $data['puce'] ? $data['puce'] : false;
       $animal = new Animal(0, $nom, $sexe, $sterilise, $puce, $person);
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
        
        
        $animal->person = $data['person_id'] ? Person::find($data['person_id']) : $animal->person;
        $animal->nom = $data['nom'] ? $data['nom'] : $animal->nom;
        $animal->sexe = $data['sexe'] ? $data['sexe'] : $animal->sexe;
        if(!isset($data['sterilise'])){
            $animal->sterilise = 0;
           }
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