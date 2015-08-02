<?php

class LoginFacebookController extends \BaseController {

	private $fb;

	public function __construct(FacebookHelper $fb) {
		$this->fb = $fb;
	}

	public function login() {
		return Redirect::to($this->fb->getUrlLogin());
	}

	public function callback() {
		if( !$this->fb->generateSessionFromRedirect() ) {
			return Redirect::route('home')
				->with('flash_error', 'Failed to connect on Facebook.')
        		->with('flash_color', '#c0392b');
		}

		$user_fb = $this->fb->getGraph();
		
		if(empty($user_fb)) {
			return Redirect::route('home')
				->with('flash_error', 'Failed to get data on Facebook.')
        		->with('flash_color', '#c0392b');
		}

		$user = User::whereUidFb($user_fb->getProperty('id'))->first();

		if(empty($user)) {
			$user = new User;
			$user->email 	= $user_fb->getProperty('email');
			$user->name 	= $user_fb->getProperty('name');
			$user->birthday = date(strtotime($user_fb->getProperty('birthday')));
			$user->photo 	= 'http://graph.facebook.com/' . $user_fb->getProperty('id') . '/picture?type=large';
			$user->uid_fb 	= $user_fb->getProperty('id');

			$user->save();
		}

		$user->access_token_fb = $this->fb->getToken();
		$user->save();

		Auth::login($user);

		return Redirect::route('home')
				->with('flash_error', 'Successfully logged in using Facebook.')
				->with('flash_color', '#27ae60');
	}
}
