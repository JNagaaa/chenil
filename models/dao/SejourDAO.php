<?php 

class SejourDAO extends DAO {
      
    public function __construct () {
        parent::__construct("sejours");
    }
    
    public function create ($data) {
        if ($data instanceof Sejour) {
            return $data;
        }
        
        if (!is_object($data)) {
            return new Sejour(
                isset($data['id']) ? $data['id'] : 0,
                $data['date'],
                $data['animal_id']
            );
        }
        return false;
    }
    
    public function store ($data , $statement = false) {
        $sejour = $this->create($data);
        
        if (!$sejour) {
            return false;
        }
        if ($sejour->animal) {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (date, animal_id) VALUES (?, ?)");
            parent::store([$sejour->date, $sejour->animal->id], $statement);
        } else {
            $statement = $this->db->prepare("INSERT INTO {$this->table} (date) VALUES (?)");
            parent::store([$sejour->date], $statement);
        }
        
    }

}