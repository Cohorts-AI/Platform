<?php

namespace App\Http\Controllers;
use \TANIOS\Airtable\Airtable;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	

	
	public function index()
	{
		
		$articles = $this->fetchArticles('Articles');
		
		$data = [
			"articles" => $articles
		];
		
		return view('articles')->with($data);

	}
	
	public function projects()
	{
		$articles = $this->fetchArticles('Projects');
		
		$data = [
			"articles" => $articles
		];
		
		return view('projects')->with($data);
	}
	
	public function show($id)
	{
		$airtable = new Airtable(array(
    	'api_key' => 'keyvFreSPTsbJU2ic',
    	'base'    => 'appagdRbOX4Ipmk33'
		));
		
		$request = $airtable->getContent( 'Articles/recEs8jhOsDfy2vLK');
		do {
				$response = $request->getResponse();
		}
		while( $request = $response->next() );
		
		$data = [
			"article" => $response
		];
		
		return view('article')->with($data);
	}
	
	private function fetchArticles($articles) 
	{
		$airtable = new Airtable(array(
    	'api_key' => 'keyvFreSPTsbJU2ic',
    	'base'    => 'appagdRbOX4Ipmk33'
		));
		
		$request = $airtable->getContent( $articles );
		
		do {
				$response = $request->getResponse();
		}
		while( $request = $response->next() );
		
		return $response[ 'records' ];
	}
	
}
