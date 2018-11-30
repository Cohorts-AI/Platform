<?php

namespace App\Http\Controllers;
use \TANIOS\Airtable\Airtable;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
		
		public function index()
		{
			 $landings = $this->fetchLandings('Landings');
		
			$data = [
				"landings" => $landings
			];

			return view('landingpages.index')->with($data);
		}
	
    public function show($id)
   	{
			$landing = $this->fetchLanding($id);
			
			$landing->class = strtolower(str_replace(' ', '', $landing->fields->Title));
			
			$data = [
				"landing" => $landing
			];
			
       return view('landingpages.show')->with($data);
   	}
	
		private function fetchLanding($landing)
		{
			$airtable = new Airtable(array(
				'api_key' => 'keyvFreSPTsbJU2ic',
				'base'    => 'appagdRbOX4Ipmk33'
			));

			$request = $airtable->getContent( 'Landings/' . $landing);
			do {
					$response = $request->getResponse();
			}
			while( $request = $response->next() );

			return $response;
		}
	  private function fetchLandings($landings) 
		{
			$airtable = new Airtable(array(
				'api_key' => 'keyvFreSPTsbJU2ic',
				'base'    => 'appagdRbOX4Ipmk33'
			));

			$request = $airtable->getContent( $landings );

			do {
					$response = $request->getResponse();
			}
			while( $request = $response->next() );

			return $response[ 'records' ];
		}
}
