<?php

class SejourController extends Controller {

    public function index () {
        $sejours = Sejour::all();
        include('../views/sejours/list.php');
    }
    
    public function show ($id) {
        $sejour = Sejour::find($id);
        include('../views/sejours/one.php');
    }
    
    public function create () {
        $animals = Animal::all();
        include('../views/sejours/create.php');
    }
    
    public function store ($data) {
       $animal = $data['animal_id'] ? Animal::find($data['animal_id']) : false;
       $date = $data['date'] ? $data['date'] : false;
    
       $sejour = new Sejour(0, $date, $animal);
       $sejour->save();
       return $this->index();
    }
    
    public function destroy ($id) {
        $sejour = Sejour::find($id);
        if (!$sejour) {
            return false;
        }
        $sejour->delete();
        return $this->index();
    }
}