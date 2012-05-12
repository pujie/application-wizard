<?php 
class Back_office extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Bo_menus');
	}
	function index(){
		if($this->auth->is_logged_in()){
			$menus = new Bo_menus();
			$header_data = array('param_title'=>'Back Office','param_header'=>'Back Office');
			$data = array('menus'=>$menus->get_menus());
			$footer_data = array('param_menu'=>anchor('home','Home','class="button"') . anchor('back_office/logout','Logout','class="button"'));
			$this->load->view('common/header',$header_data);
			$this->load->view('back_office/index',$data);
			$this->load->view('common/footer',$footer_data);
		}
		else{
			redirect('back_office/login');
		}
	}
	function login(){
		$this->load->view('common/header');
		$this->load->view('back_office/login');
		$this->load->view('common/footer');
	}
	function login_handler(){
		$params = $this->input->post();
		if($this->auth->log_in($params['name'],$params['password'])){
			redirect('back_office/index');
		}
		else{
			echo 'Wrong user/password combination';
		}
	}
	function logout(){
		$this->auth->log_out('main');
	}
}