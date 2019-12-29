<?php

namespace App\Http\Controllers;
use App\Enseignant;
use Illuminate\Http\Request;
use App\Helpers\APIHelper;

use App\Http\Requests\TeacherRequest;
class enseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignant=Enseignant::all();
        if ($enseignant->isNotEmpty()){
            $response=APIHelper::createAPIResponse(false,"200 OK","",$enseignant);
            return response()->json($response,200);
        }else{
            return response()->json(["status"=>"error","message"=>"No teacher found."]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $Enseignant=new Enseignant();
        $Enseignant->Nom=$request->Nom;
        $Enseignant->Prenom=$request->Prenom;
        $Enseignant->NomUtilisateur=$request->NomUtilisateur;
        $Enseignant->MotDePasse=$request->MotDePasse;
        $Enseignant->ConfirmMotDePasse=$request->ConfirmMotDePasse;
        $Enseignant->Module=$request->Module;
        $enseignant_save=$Enseignant->save();
        if($enseignant_save){
            $responce=APIHelper::createAPIResponse(false,"201","{{$Enseignant->Nom }} teacher with {{$Enseignant->NomUtilisateur}} added suceesfully.",null);
            return response()->json($responce,201);
        }else{
            $responce=APIHelper::createAPIResponse(true,"401"," {{$Enseignant->Nom }} teacher creation failed.",null);
            return response()->json($responce,401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enseignant=Enseignant::find($id);
        if($enseignant){
            $responce=APIHelper::createAPIResponse(false,"200 ok","",$enseignant);
        return response()->json($responce,200);
        }else{
            return response()->json(["status"=>"error","message"=>" Teacher with id {{$id}} not found.  "]);

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        $Enseignant=Enseignant::find($id);
        if($Enseignant){
            $Enseignant->Nom=$request->Nom;
            $Enseignant->Prenom=$request->Prenom;
            $Enseignant->NomUtilisateur=$request->NomUtilisateur;
            $Enseignant->MotDePasse=$request->MotDePasse;
            $Enseignant->ConfirmMotDePasse=$request->ConfirmMotDePasse;
            $Enseignant->Module=$request->Module;
            $enseignant_save=$Enseignant->save();
            if($enseignant_save){
                $responce=APIHelper::createAPIResponse(false,"201","teacher updated suceesfully.",null);
                return response()->json($responce,201);
            }else{
                $responce=APIHelper::createAPIResponse(true,"401","teacher update failed.",null);
                return response()->json($responce,401);
            }
        }else{
            return response()->json(["status"=>"error","message"=>" Teacher with id {{$id}} not found. "]);

        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Enseignant=Enseignant::find($id);
        if($Enseignant){
            $enseignant_save=$Enseignant->delete();
            if($enseignant_save){
                $responce=APIHelper::createAPIResponse(false,"200","teacher deleted suceesfully",null);
                return response()->json($responce,200);
            }else{
                $responce=APIHelper::createAPIResponse(true,"401","teacher delete failed",null);
                return response()->json($responce,401);
            }
        }else{
            return response()->json(["status"=>"error","message"=>" Teacher with id {{$id}} not found . "]);

        }
       
    }
}
