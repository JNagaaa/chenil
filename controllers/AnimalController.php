<?php
session_start();
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
        $allPeopleId = [] ;
        $allPeopleObject = Person::all();
        foreach($allPeopleObject as $personObject){
            array_push($allPeopleId, $personObject->id);
        }

        $animalChips = [];
        $objectAnimalsChips = Animal::all();
        foreach($objectAnimalsChips as $objectAnimalChip){
            array_push($animalChips, $objectAnimalChip->puce);
        }
        if(in_array($data['puce'], $animalChips)){
            $_SESSION['error']['doublon'] = "Cet animal est déjà enregistré";
        }
        if(empty($data['nom']) || preg_match('/^[0-9]*$/', $data['nom']) ){
            $_SESSION['error']['name'] = "Nom invalide";
        }
        if(empty($data['puce']) || !preg_match('/^[0-9]*$/', $data['puce'])){
            $_SESSION['error']['chip'] = "Numéro de puce invalide";
        }
        if($data['sexe'] != "Femelle" && $data['sexe'] != "Mâle"){
            $_SESSION['error']['sexe'] = "Bien essayé, mais range cette console!";
        }
        if($data['type'] != "Chat" && $data['type'] != "Chien" && $data['type'] != "Oiseau"){
            $_SESSION['error']['type'] = "Bien essayé, mais range cette console!";
        }
        if(!in_array($data['person_id'], $allPeopleId)){
            $_SESSION['error']['person'] = "Bien essayé, mais range cette console!";
        }
        if($data['sterilise'] != "1" && $data['sterilise'] != null && $data['sterilise'] != false && $data['sterilise'] != "0" ){
            $_SESSION['error']['steri'] = "Bien essayé, mais range cette console!";
        }
        if(isset($_SESSION['error'])){
            return header('Location: index.php?ctlr=animals&action=create');
        }else{
            $animalPersonToStore = Person::find($data['person_id']);
            $animalPersonID = $animalPersonToStore->id;
            $nom = $data['nom'] ? $data['nom'] : false;
            $sexe = $data['sexe'] ? $data['sexe'] : false;
            $sterilise = isset($data['sterilise']) ? $data['sterilise'] : 0;
            $puce = $data['puce'] ? $data['puce'] : false;
            $type = $data['type'] ? $data['type'] : false;
            $animal = new Animal(0, $nom, $sexe, $sterilise, $puce, $type, $animalPersonID);
            $animal->save();
            return header('Location: index.php?ctlr=animals&action=index');
        }
    }
    
    public function edit ($id) {
        $animal = Animal::find($id);
        $people = Person::all();
        include('../views/animals/edit.php');
    }
    
    public function update($id, $data) {
        if(empty($data['nom']) || preg_match('/^[0-9]*$/', $data['nom']) ){
            $_SESSION['error']['name'] = "Nom invalide";
        }
        if(empty($data['puce']) || !preg_match('/^[0-9]*$/', $data['puce'])){
            $_SESSION['error']['chip'] = "Numéro de puce invalide";
        }
        if($data['sexe'] != "Femelle" && $data['sexe'] != "Mâle"){
            $_SESSION['error']['sexe'] = "Bien essayé, mais range cette console!";
        }
        if($data['type'] != "Chat" && $data['type'] != "Chien" && $data['type'] != "Oiseau"){
            $_SESSION['error']['type'] = "Bien essayé, mais range cette console!";
        }
        if(isset($_SESSION['error'])){
            return header('Location: index.php?ctlr=animals&action=index');
        }else{
            $animal = Animal::find($id);
            if (!$animal) {
                return false;
            }
            
            $animalPersonToUpdate = Person::find($data['person_id']);
            $animalPersonToUpdateID = $animalPersonToUpdate->id;
            $animal->person = $animalPersonToUpdateID;
            $animal->nom = $data['nom'] ? $data['nom'] : $animal->nom;
            $animal->sexe = $data['sexe'] ? $data['sexe'] : $animal->sexe;
            $animal->sterilise = isset($data['sterilise']) ? $data['sterilise'] : 0;
            $animal->puce = $data['puce'] ? $data['puce'] : $animal->puce;
            $animal->type = $data['type'] ? $data['type'] : $animal->type;
            $animal->save();
            return header('Location: index.php?ctlr=animals&action=index');
        }
    }
    
    public function destroy ($id) {
        $animal = Animal::find($id);
        if (!$animal) {
            return false;
        }
        $animal->delete();
        return header('Location: index.php?ctlr=animals&action=index');
    }
}