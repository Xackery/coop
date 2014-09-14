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

		require_once(Kohana::find_file('vendor', 'Facebook/FacebookSession'));

		require_once(Kohana::find_file('vendor', 'Facebook/FacebookRequest'));
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookSDKException'));
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookRedirectLoginHelper'));

		
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookSignedRequestFromInputHelper'));
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookJavaScriptLoginHelper'));
		
		$config = Kohana::$config->load('auth');

		//$session = Session::instance($config['session_type']);
		
		$helper = new FacebookJavaScriptLoginHelper();
		try {
		  $session = $helper->getSession();
		  $this->template->content = "got session";
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
		  $this->template->content = "fb returned an error";
		} catch(\Exception $ex) {
		  // When validation fails or other local issues
		  $this->template->content = "validation failed";
		}
		if ($session) {
		  $this->template->content = "Logged in";
		  // Logged in
		}

		$consumer = OAuth2_Consumer::factory('example');

		//$request = Request::factory('http://netbeans.kiall.local/kohana-oauth2-example-provider/index.php/users/me');

		//$response = $consumer->execute($request);

		//$me = json_decode($response->body());

		//$this->response->body($response->body());
	//	$this->template->content = View::factory('content');
	}

} // End Welcome
