<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * File Auth driver.
 * [!!] this Auth driver does not support roles nor autologin.
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2012 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Auth_File extends Auth {

	// User list
	protected $_users;

	/**
	 * Constructor loads the user list into the class.
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);

		// Load user list
		$this->_users = Arr::get($config, 'users', array());
	}

	/**
	 * Logs a user in.
	 *
	 * @param   string   $email  Username
	 * @param   string   $password  Password
	 * @param   boolean  $remember  Enable autologin (not supported)
	 * @return  boolean
	 */
	protected function _login($email, $password, $remember)
	{
		if (is_string($password))
		{
			// Create a hashed password
			$password = $this->hash($password);
		}

		if (isset($this->_users[$email]) AND $this->_users[$email] === $password)
		{
			// Complete the login
			return $this->complete_login($email);
		}

		// Login failed
		return FALSE;
	}

	/**
	 * Forces a user to be logged in, without specifying a password.
	 *
	 * @param   mixed    $email  Username
	 * @return  boolean
	 */
	public function force_login($email)
	{
		// Complete the login
		return $this->complete_login($email);
	}

	/**
	 * Get the stored password for a username.
	 *
	 * @param   mixed   $email  Username
	 * @return  string
	 */
	public function password($email)
	{
		return Arr::get($this->_users, $email, FALSE);
	}

	/**
	 * Compare password with original (plain text). Works for current (logged in) user
	 *
	 * @param   string   $password  Password
	 * @return  boolean
	 */
	public function check_password($password)
	{
		$email = $this->get_user();

		if ($email === FALSE)
		{
			return FALSE;
		}

		return ($password === $this->password($email));
	}

} // End Auth File
