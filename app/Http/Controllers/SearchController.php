<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profilo;
class SearchController extends Controller
{
    public function filter(Request $request, profilo $profilo)
    {
        $profilo = $profilo->newQuery();

        // Search for a user based on their name.
        if ($request->has('first_name')) {
            $profilo->where('first_name','like', $request->input('first_name')."%");
        }
    
        // Search for a user based on their company.
        if ($request->has('last_name')) {
           
            $profilo->where('last_name','like', $request->input('last_name')."%");
        }
    
  

        return json_encode($profilo->get());
    }
}
