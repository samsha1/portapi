<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Portfolio;


/**
 * 
 */
class PortfolioController extends Controller
{

	public function index(){
		$portfolio= Portfolio::all();
		foreach ($portfolio as $value) {
			$value->view_portfolio=[
				'href'=>'api/v1/portfolio/'.$value->id,
				'method'=>'GET'
			];
		}

		$response=[
			'message'=>"List of Samrat Portfolio",
			'portfolios'=>$portfolio

		];

		return response()->json($response,200);
	}
	
	public function store(Request $request){

		$this->validate($request,[
			'title'=>'required | min:5',
			'description'=>'required',
			'url'=>'required',
			'language' => 'required'

		]);
		$response = Portfolio::create($request->all());
		$message=[
			'title'=>$response->title,
			'message'=>"Portfolio Successfully Added",
			'portfolio_id'=>$response->id
		];
		return response()->json($message,200);

		$response=[
			'message'=>"Error While Creating Portfolio"
		];

		return response()->json($response,404);


	}

	public function destroy($id){
		$find=Portfolio::find($id);

		if(!$find){
			return response()->	json(['message'=>'Portfolio Not Found'],401);
		}

		$find->delete();

		$message=[
			'message'=>"Portfolio Successfully Deleted",
			'create'=>[
				'href'=>'api/v1/meeting',
				'method'=>'POST',
				'params'=>'title,description,url,language'

			]

		];

		return response()->json($message,200);

		return response()->	json(['message'=>'Portfolio Not Found'],401);

	}
}