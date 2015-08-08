<?php

class LoginFacebookController extends \BaseController {

	private $fb;

	// Every run
	public function __construct(FacebookHelper $fb) {
		$this->fb = $fb;
	}


	// login/fb
	public function login() {
		return Redirect::to($this->fb->getUrlLogin());
	}


	// login/fb/callback
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
			$user_profile 			= new UserProfile;
			$user_profile->name 	= $user_fb->getProperty('name');
			$user_profile->birthday = date(strtotime($user_fb->getProperty('birthday')));
			$user_profile->photo 	= 'http://graph.facebook.com/' . $user_fb->getProperty('id') . '/picture?type=large';
			$user_profile->save();


			$user 					= new User;
			$user->user_profile_id 	= $user_profile->id;
			$user->privilage 		= 1;
			$user->email 			= $user_fb->getProperty('email');
			$user->uid_fb 			= $user_fb->getProperty('id');
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
