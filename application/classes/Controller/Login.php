<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Template_Core {
	
	public function before() {
		parent::before();
		$this->template->active = "login";
	}
	
	public function action_index()
	{
		echo "Login";
	}		
}