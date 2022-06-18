<?php
session_start();
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
        //Je convertis les dates d'aujourd'hui et de naissance du propriétaire pour pouvoir les comparer par après
        $todayDate = strtotime(date('Y-m-d'));
        $birthDate = strtotime($data['naissance']);
        //J'impose de stocker les noms et prénoms avec une majuscule pour éviter les doublons
        $data['nom'] = ucfirst($data['nom']);
        $data['prenom'] = ucfirst($data['prenom']);
        //Si l'utilisateur rentre un 0 dans son numéro de téléphone, on l'enlève. Ça nous sera utile pour la gestion des erreurs
        $convertedPhone = (($data['telephone']));
        if(substr($convertedPhone, 0, 1) == '0'){
            $convertedPhone = preg_replace( '/' . 0 . '/', '' , $convertedPhone, 1);
        }
        $peopleNames = [];
        $peopleFirstNames = [];
        $objectPeople = Person::all();
        foreach($objectPeople as $objectPerson){
            array_push($peopleNames, $objectPerson->nom);
        }
        foreach($objectPeople as $objectPerson){
            array_push($peopleFirstNames, $objectPerson->prenom);
        }
        if(in_array($data['nom'], $peopleNames) && in_array($data['prenom'], $peopleFirstNames)){
            $_SESSION['error']['doublon'] = "Ce propriétaire est déjà enregistré";
        }
        if(!preg_match("#^[a-zA-Z'àâäéèêëîïôöûüÀÄÂÉÈÊÎÏÔÖÛÜoeæ-]+$#", $data['nom'])){
            $_SESSION['error']['name'] = "Prénom invalide";
        }
        if(!preg_match("#^[a-zA-Z'àâäéèêëîïôöûüÀÄÂÉÈÊÎÏÔÖÛÜoeæ-]+$#", $data['prenom'])){
            $_SESSION['error']['lastname'] = "Nom invalide";
        }
        if (!str_contains($data['mail'], "@") || (strlen($data['mail'] > 10)) || !str_contains($data['mail'], ".")) {
            $_SESSION['error']['mailerror'] = "Mail envalide";
        }
        if($birthDate >= $todayDate || empty($birthDate) || !preg_match('/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/', $data['date']) == false){
            $_SESSION['error']['date'] = "Date invalide";
        }
        if(substr($convertedPhone, 0, 2) != "47" || strlen($convertedPhone) != 9 || empty($data['telephone'])){
            $_SESSION['error']['phone'] = "Numéro de téléphone invalide";
        }
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
            return header('Location: index.php?ctlr=people&action=create');
        }else{ 
            $person = new Person(0, $data["nom"], $data["prenom"], $data["naissance"], $data["mail"], $data["telephone"]);
            $person->save();   
            return header('Location: index.php?ctlr=people&action=index');
        }   
    }
    
    

    public function edit ($id) {
        $person = Person::find($id);
        include('../views/people/edit.php');
    }

    public function update($id, $data) {
        $todayDate = strtotime(date('Y-m-d'));
        $birthDate = strtotime($data['naissance']);

        $data['nom'] = ucfirst($data['nom']);
        $data['prenom'] = ucfirst($data['prenom']);

        $convertedPhone = (($data['telephone']));
        if(substr($convertedPhone, 0, 1) == '0'){
            $convertedPhone = preg_replace( '/' . 0 . '/', '' , $convertedPhone, 1);
        }
        if(!preg_match("#^[a-zA-Z'àâäéèêëîïôöûüÀÄÂÉÈÊÎÏÔÖÛÜoeæ-]+$#", $data['nom'])){
            $_SESSION['error']['name'] = "Prénom invalide";
        }
        if(!preg_match("#^[a-zA-Z'àâäéèêëîïôöûüÀÄÂÉÈÊÎÏÔÖÛÜoeæ-]+$#", $data['prenom'])){
            $_SESSION['error']['lastname'] = "Nom invalide";
        }
        if (!preg_match("/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/", $data['mail']) || (strlen($data['mail'] > 10))) {
            $_SESSION['error']['mailerror'] = "Mail invalide";
        }
        if($birthDate >= $todayDate || empty($birthDate) || !preg_match('/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/', $data['date']) == false){
            $_SESSION['error']['date'] = "Date invalide";
        }
        if(substr($convertedPhone, 0, 2) != "47" || strlen($convertedPhone) != 9 || empty($data['telephone'])){
            $_SESSION['error']['phone'] = "Numéro de téléphone invalide";
        }
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
            return header('Location: index.php?ctlr=people&action=edit&id='.$id);
        }
        else{
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
            return header('Location: index.php?ctlr=people&action=index');
        }
    }

    public function destroy ($id) {
        $person = Person::find($id);
        if (!$person) {
            return false;
        }
        $person->delete();
        return header('Location: index.php?ctlr=people&action=index');
        
    }




}