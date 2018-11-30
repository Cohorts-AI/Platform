<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    
	 public function show()
   {
       if(Auth::user()->account_id == 1) {
				 echo "Creative Dashboard";
			 } else {
				 echo "Account Admin Dashboard";
			 }
   }
	
}
