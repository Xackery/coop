<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Smarty module for Kohana 3
 * 
 * Can be used with either Smarty2 or Smarty3
 *
 * @package    Ksmarty
 * @author     Reza Esmaili
 * @copyright  (c) 2009 Reza Esmaili
 * @license    http://kohanaphp.com/license.html
 */

abstract class Ksmarty {
	
	protected static $instance;
	
	/**
	 * Ksmarty singleton instance 
	 *
	 * @return  singleton
	 */
	public static function instance()
	{		
		// Check if the instance already exists
		if (Ksmarty::$instance === NULL) {

			// Load Smarty
			if (!class_exists('Smarty', FALSE)) {
				require Kohana::find_file('vendor', 'smarty/Smarty.class');
			}
	
			// Initialize Smarty
			$s = new Smarty();
			
			// Apply configuration data
			$config = Kohana::$config->load('smarty');
			$s->compile_dir		= $config->compile_dir;
			$s->plugins_dir		= $config->plugins_dir;
			$s->cache_dir		= $config->cache_dir;
			$s->config_dir		= $config->config_dir;
	
			$s->debug_tpl		= $config->debug_tpl;
			$s->debugging_ctrl	= $config->debugging_ctrl;
			$s->debugging		= $config->debugging;
			$s->caching		= $config->caching;
			$s->force_compile	= $config->force_compile;

			// Check to see if we're using Smarty 3, in a PHP 4 compatible way
			if(!array_key_exists('_version', get_class_vars('Smarty'))) {
				// If so, we need to set the security policy using the new method
				if($config->security) {
					if($config->security_policy !== NULL) {
						$s->enableSecurity($config->security_policy);
					} else {
						// Use default settings
						$s->enableSecurity();
					}
				}
			} else {
				$s->security = $config->security;
			}		
	
			// Register the autoload filters
			$s->autoload_filters = array(
											'pre'		=> $config->pre_filters,
											'post'		=> $config->post_filters,
											'output'	=> $config->output_filters
										);
			
			// Create the instance singleton
			Ksmarty::$instance = $s;
		}
		
		// Return the singleton
		return 	Ksmarty::$instance;
	}
} // End Ksmarty
