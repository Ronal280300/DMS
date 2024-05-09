<?php
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'Inciar Sesión';
        $this->views->getView('principal', 'index',$data);
    } 
}

