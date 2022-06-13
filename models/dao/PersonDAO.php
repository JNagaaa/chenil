<?php

class PersonDAO extends DAO {
    
    public function __construct () {
        parent::__construct("people");
    }
    
    public function create ($data) {
        if ($data instanceof Person) {
            return $data;
        }
        
        if (!is_object($data)) {
            return new Person(
                isset($data['id']) ? $data['id'] : 0,
                $data['nom'],
                $data['prenom'],
                $data['naissance'],
                $data['mail'],
                $data['telephone']
            );
        }
        return false;
    }
    
    public function store ($data, $statement = false) {
        $person = $this->create($data);
        
        if (!$person) {
            return false;
        }
        
        $statement = $this->db->prepare("INSERT INTO {$this->table} (nom, prenom, naissance, mail, telephone) VALUES (?, ?, ?, ?, ?)");
        parent::store([$person->nom, $person->prenom, $person->naissance, $person->mail, $person->telephone], $statement);
    }
    
    public function update ($data, $statement = false) {
        $person = $this->create($data);
        if (!$person) {
            return false;
        }
        
        $statement = $this->db->prepare("UPDATE {$this->table} SET nom = ?, prenom = ?, naissance = ?, mail = ?, telephone = ? WHERE id = ?");
        parent::store([$person->nom, $person->prenom, $person->naissance, $person->mail, $person->telephone, $person->id], $statement);
        
    }
}