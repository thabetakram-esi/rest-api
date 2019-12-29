<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\APIHelper;
use App\Cours;
use App\Http\Requests\CoursRequest;

class coursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cours=Cours::all();
        if (($Cours->isNotEmpty())){
            $response=APIHelper::createAPIResponse(false,"200 OK","",$Cours);
            return response()->json($response,200);
        }else{
            return response()->json(["status"=>"error","message"=>"No Courses found. "]);
           
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
    public function store(CoursRequest $request)
    {
        $Cours=$request->file('Cours') ;
        $cours_name=$Cours-> getClientOriginalName();
        $cours_sans_espace= str_replace(CHR(32),"",$cours_name);
        $Cours_new_name=time().$cours_sans_espace;
        $Cours->move('uploads/Cours',$Cours_new_name);
        $ajoutCours=Cours::create([
            'Nom'=>$request->Nom,'date'=>date('Y-m-d H:i:s'),'Cours'=>"uploads/Cours/".$Cours_new_name
        ]);
        if($ajoutCours){
            $responce=APIHelper::createAPIResponse(false,"201","File added suceesfully.",null);
            return response()->json($responce,201);
        }else{
            $responce=APIHelper::createAPIResponse(false,"401","File add failed.",null);
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
        $Cours=Cours::findOrfail($id);
        $response=APIHelper::createAPIResponse(false,"200 OK","",$Cours);
        return response()->json($response,200);   
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
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
