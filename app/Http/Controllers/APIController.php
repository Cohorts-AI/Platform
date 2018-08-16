<?php

namespace App\Http\Controllers;
use \TANIOS\Airtable\Airtable;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function projects()
		{
			$projects = $this->fetchArticles('Projects');
      $published = [];
			
			foreach($projects as $project) {
				$project->active = false;
				if(isset($project->fields->Publish)) {
           array_push($published, $project);
        }
			}

			$data = [
				"projects" => $published
			];

			return $data;
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
