<?php

class Heroes extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('heroe_model');
        $this->load->helper('url');
        $this->load->database('default');
    }

	public function show(){
		$this->load->model('Heroe_Model','UM',true);
		$datos['Heroes']=$this->UM->getAllDetail();
		$datos['HeroesDetail']=$this->UM->getAll();
		$this->load->view('heroesshow.php',$datos);
	}
}
?>