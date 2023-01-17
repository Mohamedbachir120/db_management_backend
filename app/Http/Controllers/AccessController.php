<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Helpers\Crypto;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        if($request["keyword"] == "all"){
            return response()->json(["data"=>Access::all()] ,200);

        }
        $access =Access::where("username","like","%".$request["keyword"]."%")
                ->orWhere("auth_type",$request["keyword"])
                ->paginate(10);
        return response()->json($access ,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $password = null;
        if($request["auth_type"] == 0){

            $password = Crypto::encrypt($request["pwd"]);

        }
        Access::create([
            'username'=>$request["username"],
            'pwd'=>$password,
            "auth_type"=>$request["auth_type"]
        ]);
        
        return response()->json(["success"=>true,"message"=>"created successfully"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            return response()->json(["access"=>Access::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   

        $password = null;
        if($request["auth_type"] == 0){

            $password = Crypto::encrypt($request["pwd"]);

        }
        Access::where('id',$id)
            ->update([
            'username'=>$request["username"],
            'pwd'=>$password,
            "auth_type"=>$request["auth_type"]
        ]);
        
        return response()->json(["success"=>true,"message"=>"updated successfully"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Access::destroy($id);
        return response()->json(['success'=>true,"message"=>"deleted successfully"],200);
        
    }
}
