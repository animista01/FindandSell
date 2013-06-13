<?php

class Message_Controller extends Base_Controller {

	public $restful = true;    
	public function __construct() 
    {
        $this->filter('before', 'auth');
        $this->filter('before', 'csrf')->on('post');
    }

    public function get_message($id)
    {
    	$message = Message::find($id);
    	
    	return View::make('message.message')
			->with('mensaje', $message);
    }

    public function post_message()
    {
    	$input = Input::all();
    	$destination_id = $input['some'];
    	if (!$destination_id) {
    		return Redirect::to_action('user@index')
    			->with('error_no_id', true);
    	}
		$rules = array(
			'message' => 'required|match:/[a-z]+/|min:6|max:200'
		);
		$v = Validator::make($input, $rules);

		if ($v->fails()) {
			return Redirect::to_action('user@profile/'.$destination_id)
				->with_errors($v)
				->with_input();
		}
		$message = new Message;
		$message->body = $input['message'];
		$message->user_id = Auth::user()->id;
		$message->destination_id = $destination_id;
		$message->save();

		return Redirect::to_action('user@index')
			->with('mensaje_enviado', true);
    }
}