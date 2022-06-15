<?php

class SejourController extends Controller {

    public function index () {
        $sejours = Sejour::all();
        include('../views/sejours/list.php');
    }
    
    public function show ($id) {
        $sejour = Sejour::find($id);
        $listAnimals = Sejour::where('date', $sejour->date);
        include('../views/sejours/one.php');
    }
    
    public function create () {
        $animals = Animal::all();
        include('../views/sejours/create.php');
    }
    
    public function store ($data) {
        $sejourAnimalToStore = Animal::find($data['animal_id']);
        $sejourAnimalToStoreID = $sejourAnimalToStore->id;
        $date = $data['date'] ? $data['date'] : false;
        $sejour = new Sejour(0, $date, $sejourAnimalToStoreID);
        $sejour->save();
        return $this->index();
    }
    
    public function destroy ($id) {
        $sejour = Sejour::find($id);
        if (!$sejour) {
            return false;
        }
        $sejour->delete();
        return header('Location: index.php?ctlr=sejours&action=index');
    }
}