<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
     $data['title'] = 'Panel de administración';
     $this->views->getView('admin', 'home', $data);
    } 
  
}

