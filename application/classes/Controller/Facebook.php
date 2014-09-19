<?php defined('SYSPATH') or die('No direct script access.');
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookRequest;
class Controller_Facebook extends Template_Core {

	public function action_index()
	{
		$gameList = DB::query(Database::SELECT, "SELECT * FROM game")->execute();
		$this->template->content = $gameList[0]['name'];

		require_once(Kohana::find_file('vendor', 'vendor/autoload'));
		
		$config = Kohana::$config->load('auth');

		//$session = Session::instance($config['session_type']);
		
		FacebookSession::setDefaultApplication('376812619137510', 'd054fff7f6146da72c9585d78d0357b5');
		$helper = new FacebookJavaScriptLoginHelper();
		try {
			$session = $helper->getSession();
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
		  $this->template->content = "fb returned an error";
		} catch(\Exception $ex) {
		  // When validation fails or other local issues
		  $this->template->content = "validation failed";
		  //print_r($ex);
		}
		if (isset($session)) {
			$request = new FacebookRequest($session, 'GET', '/me');
			$response = $request->execute();
			$graphObject = $response->getGraphObject();
			if (isset($graphObject->id)) {
				$loginData = array('first_name' => $graphObject->first_name);	
			}
			$this->template->content = "Hi, ".$graphObject->getProperty('first_name');
		} else {
			echo "No session";
		}
	}

} // End Welcome
