<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use App\Helpers\APIHelper;
use App\Http\Requests\StudentRequest;
class etudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants=Etudiant::all();
        if($etudiants->isNotEmpty()){
            $response=APIHelper::createAPIResponse(false,"200 OK","",$etudiants);
            return response()->json($response,200);
        }else{
            return response()->json(["status"=>"error","message"=>"No students found. "]);

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
    public function store(StudentRequest $request)
    {
        
        $Etudiant=new Etudiant();
        $Etudiant->Nom=$request->Nom;
        $Etudiant->Prenom=$request->Prenom;
        $Etudiant->NomUtilisateur=$request->NomUtilisateur;
        $Etudiant->MotDePasse=$request->MotDePasse;
        $Etudiant->ConfirmMotDePasse=$request->ConfirmMotDePasse;
        $Etudiant->NiveauEtude=$request->NiveauEtude;
        $etudiant_save=$Etudiant->save();
        if($etudiant_save){
            $responce=APIHelper::createAPIResponse(false,"201", $Etudiant->Nom. " student with email {{$Etudiant->NomUtilisateur}} added suceesfully.",null);
            return response()->json($responce,201);
        }else{
            $responce=APIHelper::createAPIResponse(true,"401",$Etudiant->Nom." student creation failed.",null);
            return response()->json($responce,401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $etudiant=Etudiant::find($id);
        if($etudiant){
            $responce=APIHelper::createAPIResponse(false,"200 ok","",$etudiant);
            return response()->json($responce,200);
        }else{
            return response()->json(["status"=>"error","message"=>" Student with id {{$id}} not found.  "]);

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
    public function update(StudentRequest $request, $id)
    {
        $Etudiant=Etudiant::find($id);
        if($Etudiant){
            $Etudiant->Nom=$request->Nom;
            $Etudiant->Prenom=$request->Prenom;
            $Etudiant->NomUtilisateur=$request->NomUtilisateur;
            $Etudiant->MotDePasse=$request->MotDePasse;
            $Etudiant->ConfirmMotDePasse=$request->ConfirmMotDePasse;
            $Etudiant->NiveauEtude=$request->NiveauEtude;
            $etudiant_update=$Etudiant->save();
            if($etudiant_update){
                $responce=APIHelper::createAPIResponse(false,"200","student updated suceesfully.",null);
                return response()->json($responce,200);
            }else{
                $responce=APIHelper::createAPIResponse(true,"401","student update failed.",null);
                return response()->json($responce,401);
            }
        }else{
            return response()->json(["status"=>"error","message"=>" student with id {{$id}} not found.  "]);

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
        $Etudiant=Etudiant::find($id);
        if ($Etudiant){
            $etudiant_delete=$Etudiant->delete();
            if($etudiant_delete){
                $responce=APIHelper::createAPIResponse(false,"200","student deleted suceesfully.",null);
                return response()->json($responce,200);
            }else{
                $responce=APIHelper::createAPIResponse(true,"401","student delete failed.",null);
                return response()->json($responce,401);
            }

        }else{
            return response()->json(["status"=>"error","message"=>"Student with {{$id}} not found."]);

        }
      
        
    }
}
