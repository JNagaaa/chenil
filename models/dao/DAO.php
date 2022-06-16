<?php
abstract class DAO implements DAOInterface {
    protected $db;
    protected $table;
    
    public function __construct ($table) {
        $this->table = $table;
        $this->db = new PDO('mysql:host=localhost;dbname=dbchenil', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function fetch ($id) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE id=?");
        try {
            if(is_array($id) == true) {
                $id = $id['id'];
            }
            $statement->execute([$id]); 
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $this->create($result);
            }
            return false;
            
        } catch (PDOException $exception) {
            var_dump($exception);
            return false;
        }
    }
    
    public function where ($attr, $value) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$attr}=?");
        try {
            $statement->execute([$value]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                $list = array();
                foreach($results as $result) {
                    array_push($list, $this->create($result));
                }
                return $list;
            }
            return false;
            
        } catch (PDOException $exception) {
            var_dump($exception);
            return false;
        }
    }
    /*
    public function dubbleWhere ($attr,$value,$attr2,$value2) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$attr}=? and {$attr2}=?");
        try {
            $statement->execute([$value, $value2]);
            //$statement->execute([$value2]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                $list = array();
                foreach($results as $result) {
                    array_push($list, $this->create($result));
                }
                return $list;
            }
            return false;
            
        } catch (PDOException $exception) {
            var_dump($exception);
            return false;
        }
    }
    */
    public function first ($attr, $value) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$attr}=?");
        try {
            $statement->execute([$value]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $this->create($result);
            }
            return false;
        } catch (PDOException $exception) {
            var_dump($exception);
            return false;
        }
    }
    
    public function fetch_all () {
        $statement = $this->db->prepare("SELECT * FROM {$this->table}");
        try {
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                $list = array();
                foreach($results as $result) {
                    array_push($list, $this->create($result));
                }
                return $list;
            }
            return false; 
        } catch (PDOException $exception) {
            var_dump($exception);
        }
    }
    
    public function destroy ($id) {
        $statement = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        try {
            $statement->execute([$id]);
            return true; 
        } catch (PDOException $exception) {
            if ($exception->getCode() == "23000") {
                $_SESSION['key'] = "Attention une relation empeche la suppression";
            }
            var_dump($exception->getCode());
            return false;
        }
    }
    
    public function store ($data, $statement = false) {
        
        try {
            $statement->execute($data);
            return true;
            
        } catch (PDOException $exception) {
            var_dump($exception);
            return false;
        }
    }
}