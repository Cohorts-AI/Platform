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
		$article = $this->fetchArticle($id);
		
		$data = [
			"article" => $article
		];
		
		return view('article')->with($data);
	}
	
	public function showProject($id)
	{
		$article = $this->fetchArticle($id);
		
		$data = [
			"article" => $article
		];
		
		return view('project')->with($data);
	}
	
	private function fetchArticle($article)
	{
		$airtable = new Airtable(array(
    	'api_key' => 'keyvFreSPTsbJU2ic',
    	'base'    => 'appagdRbOX4Ipmk33'
		));
		
		$request = $airtable->getContent( 'Articles/' . $article);
		do {
				$response = $request->getResponse();
		}
		while( $request = $response->next() );
		
		return $response;
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
