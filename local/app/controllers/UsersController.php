<?php

class UsersController extends \BaseController {

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user)) {
            return Redirect::route('home');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
        	->with('flash_error', 'Your username/password combination was incorrect.')
        	->with('flash_color', '#c0392b')
        	->withInput();
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

	public function create()
	{
		return View::make('register');
	}

	public function store()
	{
		$input = Input::all();

	    $rules = array(
	        'username' => 'required|min:5|unique:users,username',
			'password' => 'required|confirmed',
			'password_confirmation' => 'same:password',
			'borrower_code' => 'required|unique:borrowers,borrower_code',
			'first_name' => 'required',
			'last_name' => 'required'
	    );

	    $custom_error = array(
	    	'borrower_code.unique' => 'The Student ID was already been taken. Ask Librarian to create your account.'
	    );

	    $validation = Validator::make($input, $rules, $custom_error);

	    if($validation->passes()) {
	    	$borrower = new Borrower;
			$borrower->borrower_code = Input::get('borrower_code');
			$borrower->first_name = Input::get('first_name');
			$borrower->last_name = Input::get('last_name');
			$borrower->penalty = 0;
			$borrower->save();

	    	$user = new User;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->previlage = 1;
			$user->borrower_id = $borrower->id;
			$user->save();

			return Redirect::route('login')
						->with('flash_error', 'You have been successfully registered. Please sign-in to continue.')
						->with('flash_color', '#27ae60');
	    } else {
	    	return Redirect::back()
		    	->withInput()
		    	->withErrors($validation)
		    	->with('flash_error', 'Validation Errors!');
	    }
	}
}
