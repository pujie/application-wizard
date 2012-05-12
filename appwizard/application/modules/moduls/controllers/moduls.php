<?php
class Moduls extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modul');
	}
	function index(){
		$moduls = new Modul();
		$header_data = array('param_title'=>'Modules','param_header'=>'Modules');
		$data = array('modules'=>$moduls->get_moduls());
		$this->load->view('common/header',$header_data);
		$this->load->view('moduls/index',$data);
		$this->load->view('common/footer');
	}
}