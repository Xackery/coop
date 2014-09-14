<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Game extends Model {
	/**
	* Insert a new game into database
	* @return row number inserted or error
	*/
	public function insert($name) {
		$data = array('name' => $name);
		$this->check($data);
		return DB::insert('game', array('name'))->values($data)->execute()[0];
	}

	public function update($id, $data) {
		$this->check($data);
		$update = Validation::factory(array('id' => $id))
			->rule('id', 'not_empty');
		if (!$update->check()) throw new Validation_Exception($update);
		$update = DB::update('game')->set($data)->where('id', '=', $id)->execute();
		return ($update == 0) ? 1 : $update;
	}

	public function check($data) {
		$data = Validation::factory($data)
			->rule('name', 'not_empty');
			//->rule('name', 'regex', array('/^[a-z_.]++$/iD'))
			//->filter('name', 'trim')
			//->rule('name', 'min_length', array('3'));
		if ($data->check()) return 1; 
		throw new Validation_Exception($data);
	}

}