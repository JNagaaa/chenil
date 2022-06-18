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
        $allAnimalsId = [] ;
        $allAnimalsObject = Animal::all();
        foreach($allAnimalsObject as $animalObject){
            array_push($allAnimalsId, $animalObject->id);
        }

        $sejoursOnThisDate = [];
        $sejoursOnThisDateObject = Sejour::where('date', $data['date']);
       
        if(isset($sejoursOnThisDateObject) && !empty($sejoursOnThisDateObject)){
            foreach($sejoursOnThisDateObject as $sejourOnThisDateObject){
                array_push($sejoursOnThisDate, $sejourOnThisDateObject->animal->id);
            }
        }

        $allSejoursDates = [];
        $allSejours = Sejour::all();
        foreach($allSejours as $sejourObject){
            array_push($allSejoursDates, $sejourObject->date);
        }
        
        $nbSejoursByDate = array_count_values($allSejoursDates);
        
        if($nbSejoursByDate[$data['date']] == 10){
            $_SESSION['error']['number'] = "error";
        }
        if(!preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", $data['date']) || empty($data['date']) || $data['date'] < date('Y-m-d')){
            $_SESSION['error']['date'] = "Date invalide";
        }
        if(in_array($data['animal_id'], $sejoursOnThisDate)){
            $_SESSION['error']['doublon'] = "error";
        }
        if(!in_array($data['animal_id'], $allAnimalsId)){
            $_SESSION['error']['animal'] = "Bien essayé, mais range cette console!";
        }
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

