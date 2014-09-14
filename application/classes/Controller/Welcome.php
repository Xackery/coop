<?php defined('SYSPATH') or die('No direct script access.');
use Facebook\FacebookSession;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;

use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookJavaScriptLoginHelper;

class Controller_Welcome extends Template_Core {

	public function action_index()
	{
		$gameList = DB::query(Database::SELECT, "SELECT * FROM game")->execute();
		$this->template->content = $gameList[0]['name'];
		$game = Model::factory('Game')->insert(array('name' => 'test'));
		
		print_r($game);
		exit;
		//$this->template->content = View::factory('content');
	}

} // End Welcome
