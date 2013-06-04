<?php

class User_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
    	if (Auth::guest()) {
			return View::make('home.index');
		}else{
			return View::make('user.index');;
		}
    } 
	
	public function get_register()
	{
		return View::make('user.register');
	}
	
	public function post_recibirCoord()
	{
		Session::put('latitud',Input::get('lati'));			
		Session::put('longitud',Input::get('longi'));
	}
	
	public function post_register()
	{
		$input = Input::all();
		$rules = array(
			'nombre' => 'required|match:/[a-z]+/|min:3|max:15',
			'apellido' => 'required|match:/[a-z]+/|min:3|max:20',
			'email' => 'required|unique:users|email',
			'password' => 'required|min:5|max:20',
			'telefono' => 'required|numeric',
			'tipo' => 'required'
		);
		$v = Validator::make($input, $rules);

		if ($v->fails()) {
			return Redirect::to_action('user@register')
				->with_errors($v)
				->with_input('except', array('password'))
				->with('error_register', true);
		}
			$password = $input['password'];
			$password = Hash::make($password);
			
			$user = new User;
			$user->name = $input['nombre'];
			$user->lastname = $input['apellido'];
			$user->email = strtolower($input['email']);
			$user->telphone = $input['telefono'];
			$user->type = $input['tipo'];
			$user->lat = Session::get('latitud'); 
			$user->lng = Session::get('longitud');
			$user->password = $password;
			$user->save();

			Session::forget('latitud');
			Session::forget('longitud');
			return View::make('user.formlogin')
				->with('success_message', true);
	}
    public function get_login()
    {
		return View::make('user.formlogin');
    }
    public function post_login()
    {
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
		if (Auth::attempt($credentials)) {
			return Redirect::to_action('user@profile');
		}else{
			return Redirect::to_action('user@login')
				->with_input('only', array('username'))
				->with('error_login', true);
		}   
	}  

	public function get_profile()
	{
		$tipo = 'V';
		
		$count_Sellers = User::where('type','=','V')->count();
		$all_locations = eloquent_to_json(User::where('type','=', $tipo)->get(array('name','lastname','lat','lng')));
		$userData = eloquent_to_json(User::where_id(Auth::user()->id)->get(array('name','lastname','lat','lng')));		

		return View::make('user.profile')
			->with('userlogeado', $userData)
			->with('countsellers', $count_Sellers)
			->with('jsonSellers', $all_locations);
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}