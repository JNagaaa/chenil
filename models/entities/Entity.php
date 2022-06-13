<?php

abstract class Entity implements EntityInterface {
    protected $dao;
    
    public function __construct ($dao) {
        $this->dao = new $dao();
    }
    
    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }
    
    
    public function __set ($prop, $value) {
        if (property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
    
    public function save () {
        if ($this->id) {
            return $this->dao->update($this);
        }
        return $this->dao->store($this);
    }
    
    public function delete () {
        return $this->dao->destroy($this->id);
    }
    
    public static function find ($id) {
        return (new static::$dao_name())->fetch($id);
    }
    
    public static function all () {
        return (new static::$dao_name())->fetch_all();
    }
    
    public static function where ($attr, $value) {
        return (new static::$dao_name())->where($attr, $value);
    }
    
    public static function first ($attr, $value) {
        return (new static::$dao_name())->first($attr, $value);
    }
    
    protected function belongsTo($class, $prop) {
        if ($this->$prop instanceof $class) {
            return $this->$prop;
        }
        $this->$prop = $class::first('id', $this->$prop);
        return $this->$prop;
    }
    
    protected function hasMany($class, $prop, $name) {
        if ($this->$prop) {
            return $this->$prop;
        }
        $this->$prop = $class::where($name.'_id', $this->id);
        return $this->$prop;
    }
    
    /*protected function belongsToMany($class) {
        
    }*/
    
    abstract public function __toString();
}