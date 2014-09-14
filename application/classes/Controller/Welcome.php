<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Template_Core {

	public function action_index()
	{
		$this->template->content = View::factory('content');
	}

} // End Welcome
