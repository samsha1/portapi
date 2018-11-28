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
	
	public function store(Request $request){

		$this->validate($request,[
			'title'=>'required | min:5',
			'description'=>'required',
			'url'=>'required',
			'language' => 'required'

		]);
		$response = Portfolio::create($request->all());
		return response()->json($response,200);

		$response=[
			'message'=>"Error While Creating Portfolio"
		];

		return response()->json($response,404);


	}
}