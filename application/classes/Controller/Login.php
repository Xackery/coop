<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Template_Core {
	
	public function before() {
		parent::before();
		$this->template->active = "login";
	}
	
	public function action_index()
	{
		if (Auth::instance()->logged_in('login')) $this->redirect('member/index');

		if (!Auth::instance()->login(Arr::get($post, 'email', ''), Arr::get($post, 'password', ''))) {
			$this->template->loginMessage = SESSION::instance()->get('message');
		} else {
			if (Auth::instance()->logged_in('admin')) $this->redirect('/admin/index');
			else if (Auth::instance()->logged_in('login')) $this->redirect('member/index');

			$curUser = Auth::instance()->get_user();
		    $curUser->last_login = date('Y-m-d H:i:s');
			$curUser->update();
		}
	}		
}