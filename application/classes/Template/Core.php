<?php defined('SYSPATH') or die('No direct script access.');

class Template_Core extends Controller_Template {
	public $template;
	
	public function before()
	{
		/*if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "") {
            $redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header("Location: $redirect");
        }*/
		if ($this->template == '') $this->template = '_template';
		parent::before();
	}
}