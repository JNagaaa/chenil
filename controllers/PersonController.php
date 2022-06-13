<?php

class PersonController extends Controller {
    public function index () {
        $people = Person::all();
        include('../views/people/list.php');
    }
    
    public function show ($id) {
        $person = Person::find($id);
        include('../views/people/one.php');
    }
    
    public function create () {
        include('../views/people/create.php');
    }
    
    public function store ($data) {
        if($data["nom"]) {
            $dateFR = str_replace('-', '/', date('d-m-Y', strtotime($data['naissance'])));
            $data["naissance"] = $dateFR;
            var_dump($data);
            $person = new Person(0, $data["nom"], $data["prenom"], $data["naissance"], $data["mail"], $data["telephone"]);
            $person->save();
        }
        return $this->index();
    }
    

    public function edit ($id) {
        $person = Person::find($id);
        include('../views/people/edit.php');
    }

    public function update($id, $data) {
        $person = Person::find($id);
        if (!$person) {
            return false;
        }
        
        
        $person->nom = $data['nom'] ? $data['nom'] : $person->nom;
        $person->prenom = $data['prenom'] ? $data['prenom'] : $person->prenom;
        $person->naissance = $data['naissance'] ? $data['naissance'] : $person->naissance;
        $person->mail = $data['mail'] ? $data['mail'] : $person->mail;
        $person->telephone = $data['telephone'] ? $data['telephone'] : $person->telephone;

        $person->save();
        return $this->index();
    }

    public function destroy ($id) {
        $person = Person::find($id);
        if (!$person) {
            return false;
        }
        $person->delete();
        return $this->index();
        
    }




}