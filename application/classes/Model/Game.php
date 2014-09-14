<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Game extends Model {
	/**
	*/
	public function insert($data) {
		$post = Validation::factory($data)
			->rule('name', 'not_empty');
			//->rule('name', 'regex', array('/^[a-z_.]++$/iD'))
			//->filter('name', 'trim')
			//->rule('name', 'min_length', array('3'));
		if ($post->check()) {

			return true;
		}
		return $post->errors('game');
	}

}