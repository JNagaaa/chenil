<?php 

class AnimalDAO extends DAO {
      
    public function __construct () {
        parent::__construct("animals");
    }
    
    public function create ($data) {
        if ($data instanceof Animal) {
            return $data;
        }
        
        if (!is_object($data)) {
            return new Animal(
                isset($data['id']) ? $data['id'] : 0,
                $data['nom'],
                $data['sexe'],
                $data['sterilise'],
                $data['puce'],
                $data['person_id']
            );
        }
        return false;
    }
    
    public function store ($data , $statement = false) {
        $animal = $this->create($data);
        
        if (!$animal) {
            return false;
        }
        if ($animal->person) {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (nom, sexe, sterilise, puce, person_id) VALUES (?, ?, ?, ?, ?)");
            parent::store([$animal->nom, $animal->sexe, $animal->sterilise, $animal->puce, $animal->person->id], $statement);
        } else {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (nom, sexe, sterilise, puce) VALUES (?, ?, ?, ?)");
            parent::store([$animal->nom, $animal->sexe, $animal->sterilise, $animal->puce], $statement);
        }
        
    }
    
    public function update ($data, $statement = false) {
        $animal = $this->create($data);
        if (!$animal) {
            return false;
        }
        
        if ($animal->person) {
            $statement = $this->db->prepare("UPDATE {$this->table} SET nom = ?, sexe = ?, sterilise = ?, puce = ?, person_id = ? WHERE id = ?");
            parent::store([$animal->nom, $animal->sexe, $animal->sterilise, $animal->puce, $animal->person->id, $animal->id], $statement);
        } else {
            $statement = $this->db->prepare("UPDATE {$this->table} SET nom = ?, sexe = ?, sterilise = ?, puce = ? WHERE id = ?");
            parent::store([$animal->nom, $animal->sexe, $animal->sterilise, $animal->puce, $animal->id], $statement);
        }
    }
}