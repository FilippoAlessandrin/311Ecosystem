<?php

namespace App\Http\Controllers;
use App\profilo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfili(profilo $profilo){
        $profili = profilo::all();

        foreach ($profili as $profilo) {
            return json_encode($profilo);
        }
    }
    public function getProfilo(profilo $profilo, $id){
        $result = $profilo::where('id_user',$id);

        return json_encode($profilo->first());
      
        
    }
}
