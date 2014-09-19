<?php defined('SYSPATH') or die('No direct script access.');
use Facebook\FacebookSession;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;

use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookJavaScriptLoginHelper;

class Controller_Facebook extends Template_Core {

	public function action_index()
	{
		$gameList = DB::query(Database::SELECT, "SELECT * FROM game")->execute();
		$this->template->content = $gameList[0]['name'];

		require_once(Kohana::find_file('vendor', 'Facebook/FacebookSession'));

		require_once(Kohana::find_file('vendor', 'Facebook/Entities/AccessToken'));
		require_once(Kohana::find_file('vendor', 'Facebook/HttpClients/FacebookCurlHttpClient'));
		require_once(Kohana::find_file('vendor', 'Facebook/HttpClients/FacebookHttpable'));


		require_once(Kohana::find_file('vendor', 'Facebook/FacebookRequest'));
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookSDKException'));
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookRedirectLoginHelper'));

		
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookSignedRequestFromInputHelper'));
		require_once(Kohana::find_file('vendor', 'Facebook/FacebookJavaScriptLoginHelper'));
		
		$config = Kohana::$config->load('auth');

		//$session = Session::instance($config['session_type']);
		FacebookSession::setDefaultApplication('376812619137510', 'd054fff7f6146da72c9585d78d0357b5');

$helper = new FacebookRedirectLoginHelper('http://coop.lc/facebook');
session_start();
$session = $helper->getSessionFromRedirect();
$this->template->content = $helper->getLoginUrl();

 //$session = $helper->getSessionFromRedirect();
//	$this->template->content = $helper->getLoginUrl();
/*
//facebook javascript helper
		$helper = new FacebookJavaScriptLoginHelper();
		  $session = $helper->getSession();
		  print_r($session);
		  echo "Rawr";
		  if($session) {

		  $this->template->content = "got session";
  try {
    $user_profile = (new FacebookRequest(
      $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());

    echo "Name: " . $user_profile->getName();

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}
*/

		  /*$request = new FacebookRequest($session, 'GET', '/me');
		  $response = $request->execute();
		  $graphObject = $response->getGraphObject();

		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
		  $this->template->content = "fb returned an error";
		} catch(\Exception $ex) {
		  // When validation fails or other local issues
		  $this->template->content = "validation failed";
		  print_r($ex);
		}
		if ($session) {
		  $this->template->content = "Logged in";
		  // Logged in
		}
*/
		//$request = Request::factory('http://netbeans.kiall.local/kohana-oauth2-example-provider/index.php/users/me');

		//$response = $consumer->execute($request);

		//$me = json_decode($response->body());

		//$this->response->body($response->body());
	//	$this->template->content = View::factory('content');
	}

} // End Welcome
