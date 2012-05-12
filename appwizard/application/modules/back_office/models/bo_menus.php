<?php
class Bo_menus extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_menus(){
		$menus = '<div class="menus">' . anchor('moduls','Modules','class="button"') . '</div>';
		return $menus;
	}
}