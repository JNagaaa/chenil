<?php
class Router {


    

    private $get;
    private $post;
    private $controllers;
    private $data;
    private $request;
    private $actions;

    public function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;

        
        //liste des actions possibles
        $this->actions = [
            'create',
            'edit',
            'destroy',
            'show',
            'update',
            'store',
            'index'
        ];
        
        //liste des controllers existants
        $this->controllers = [
            'home' => 'HomeController',
            'index' => 'HomeController',
            'animals' => 'AnimalController',
            'people' => 'PersonController',
            'sejours' => 'SejourController'
        ];
        
        $this->request = array();
        $this->parseURI($_SERVER['REQUEST_URI']);// = $this->$_SERVER['QUERY_STRING'];
        $test = $this->parseURI($_SERVER['QUERY_STRING']);
        $this->data = $this->parseURI($_SERVER['REQUEST_URI']);
        $this->dispatch();
        $this->run();
    }

    private function parseURI ($server_uri) {
        // si il y a un ? dans $server_uri, alors enlever tout ce qu'il y a apres
        if (strpos( $server_uri, "?")) {
            $server_uri = strstr($server_uri, '?', true);
        }

        $server_uri = explode("/", substr($server_uri, 1));
        return $server_uri;
    }



    
    private function dispatch () {

        //detection get/post
        if ($this->post && count($this->post)) {
            $this->request['method'] = 'post';
        } else {
            $this->request['method'] = 'get';
        }


        //verifier si on a 1 controller, 1 action et 1 id
        if ($this->request['method'] == 'get') {
            (!empty($this->get['ctlr'])) ? $this->data[0] = $this->get['ctlr'] : false;
        }else{
            $this->data[0] = $this->post['ctlr'];
        }
        if (!array_key_exists($this->data[0], ($this->controllers))) {
            $this->data[0] = 'index';
        }
        
        if (!isset($this->controllers[$this->data[0]])) {
            echo "ERR : CONTROLLER NOT FOUND";
        } else {
            $this->request['controller'] = $this->controllers[$this->data[0]];
        }
        

        //detecter l'action => voir si on en a trouvé une, ou pas, si celle qu'on a trouvé est autorisée
        if($this->request['method'] == 'get'){
            (!empty($this->get['action'])) ? $this->data[1] = $this->get['action'] : false;
        }else{
            $this->data[1] = $this->post['action'];
        }
        if (count($this->data) >= 2 && $this->data[1]) {
            if(!in_array($this->data[1], $this->actions)) {
                echo "ERR : ACTION NOT FOUND";
                die;
            }

            $this->request['action'] = $this->data[1];
        } else {
            //l'action par défaut est l'index
            $this->request['action'] = "index";
        }

        //detection de l'id
        if(isset($this->post['id']) && !empty($this->post['id'])){
            $this->request['id'] = $this->post['id'];
        }else{
            false;
        }


        if (count($this->data) >= 3 && $this->data[2]) {
            $this->request['id'] = $this->data['id'];
        } else {
            false;
        }



    }
    
    //code qui va instancier le controller et appeller l'action correspondante
    private function run () {
        //instancier 1 controller
        $this->controller_instance = new $this->request['controller'];

        $data = $this->get;
        if($this->request['method'] == 'post')  {
            $data = $this->post;
        }

        //appeller la méthode du controller
        if (empty($this->request['id'])){
           //si on avait pas détecter d'id, alors on lui passe les $data en parametre
          $this->controller_instance->{$this->request['action']}($data);
        } else{
            //si on a détecté une ID alors on lui passe l'ID en parametre
            $id=$this->request['id'];
            unset($data['id']);
          $this->controller_instance->{$this->request['action']}($id,$data);
        }
    }
}

