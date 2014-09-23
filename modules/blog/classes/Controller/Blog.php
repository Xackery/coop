<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Blog extends Template_Core {			
	
	public function before() {
		parent::before();
		$this->template->active = "blog";
	}
	
	public function action_index()	{
		$this->template->content = View::factory('/blog/list');
	}
	
	public function action_view()	{
		$this->template->content = View::factory('/blog/view');
	}
}