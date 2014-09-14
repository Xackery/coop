<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Template_Core {

	public function action_index()
	{
		$gameList = DB::query(Database::SELECT, "SELECT * FROM game")->execute();
		$this->template->content = $gameList[0]['name'];
	//	$this->template->content = View::factory('content');
	}

} // End Welcome
