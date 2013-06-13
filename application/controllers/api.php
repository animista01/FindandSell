<?php
class Api_Controller extends Base_Controller{
	public $restful = true;
	public function __construct()
    {
    	//header("content-type: application/json"); 
    	header('Access-Control-Allow-Origin: *'); // allow cross domain origin access
    }

    public function get_seller()
    {
		$tipo = 'V';
    	//Traer todas los sellers
		$all_sellers = User::where_type($tipo)->get();

		//Variable que se exportará en JSON
		$sellers = array();
		
		//Recorremos todos los sellers para extraer solo los datos que nos importan
		foreach($all_sellers as $seller){
			//Almacenando los datos necesarios en el arreglo a exportar
			$sellers['datos'][]  = array(
				'id' => $seller->id,
				'name' => $seller->name,
				'lastname' => $seller->lastname,
				'email' => $seller->email,
				'telphone' => $seller->telphone,
				'lat' => $seller->lat,
				'lng' => $seller->lng
			);
		}
		//Mostrar el JSON
		return Response::json($sellers);
    }
}