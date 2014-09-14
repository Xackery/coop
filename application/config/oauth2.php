<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Default config for the OAuth2 module
 *
 * @package   OAuth2
 * @category  Config
 * @author    Managed I.T.
 * @copyright (c) 2011 Managed I.T.
 * @license   https://github.com/managedit/kohana-oauth2/blob/master/LICENSE.md
 */
return array(
	'consumer' => array(
		'example' => array(
			'grant_type'    => OAuth2::GRANT_TYPE_PASSWORD,
			'client_id'     => '113ee767-e7f8-4294-a972-80a97a7f9926',
			'client_secret' => '36e79816-8ee1-4e4a-9f2a-8cf670861f05',
			'authorize_uri' => 'http://netbeans.kiall.local/kohana-oauth2-example-provider/index.php/oauth2/authorize',
			'token_uri'     => 'http://netbeans.kiall.local/kohana-oauth2-example-provider/index.php/oauth2/token',
		),
		'facebook' => array(
			'grant_type'    => OAuth2::GRANT_TYPE_PASSWORD,
			'client_id'     => '376812619137510',
			'client_secret' => 'd054fff7f6146da72c9585d78d0357b5',
			'authorize_uri' => 'https://facebook.com/dialog/oauth?response_type=token&client_id=376812619137510&redirect_uri=REDIRECT_URI&scope=email',
			'token_uri'     => 'http://netbeans.kiall.local/kohana-oauth2-example-provider/index.php/oauth2/token',
		),
	)
);