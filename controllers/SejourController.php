<?php
session_start();
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
        
        $todayDate = strtotime(date('Y-m-d'));
        $sejourDate = strtotime($data['date']);

        $allSejoursDates = [];
        $allSejours = Sejour::all();
        foreach($allSejours as $sejourObject){
            array_push($allSejoursDates, $sejourObject->date);
        }
        
        $nbSejoursByDate = array_count_values($allSejoursDates);
        
        if($nbSejoursByDate[$data['date']] == 10){
            $_SESSION['error']['number'] = "error";
        }
        if($sejourDate < $todayDate || empty($data['date'])){
            $_SESSION['error']['date'] = "error";
        }/*
        if(){
            $_SESSION['error']['doublon'] = "error";
        }*/
        if(isset($_SESSION['error'])){
            return header('Location: index.php?ctlr=sejours&action=create');
        }else{
            $sejourAnimalToStore = Animal::find($data['animal_id']);
            $sejourAnimalToStoreID = $sejourAnimalToStore->id;
            $date = $data['date'] ? $data['date'] : false;
            $sejour = new Sejour(0, $date, $sejourAnimalToStoreID);
            $sejour->save();
            return header('Location: index.php?ctlr=sejours&action=index');
        }
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
?>

