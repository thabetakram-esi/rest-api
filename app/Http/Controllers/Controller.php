<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Cours;
use App\Helpers\APIHelper;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//Etudiant Controller :))

    public function ConsulterCours()
    {
        $Cours=Cours::all();
        if (($Cours->isNotEmpty())){
            $response=APIHelper::createAPIResponse(false,"200 OK","",$Cours);
            return response()->json($response,200);
        }else{
            return response()->json(["status"=>"error","message"=>"No Courses found.  "]);
           
        }
    }

  

    public function downloadfile($id){
        $cours=Cours::find($id);
        if($cours){
            $cours_name=str_replace('http://localhost:8000/',"",$cours->Cours);
            return response()->download(public_path($cours_name),$cours->Nom);
        }else{
            return response()->json(["status"=>"error","message"=>" Course  not found.  "]);

        }

    }
}
