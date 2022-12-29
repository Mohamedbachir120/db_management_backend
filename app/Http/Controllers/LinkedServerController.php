<?php

namespace App\Http\Controllers;

use App\Models\LinkedServer;
use Illuminate\Http\Request;

class LinkedServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response()->json(["linked server"=>LinkedServer::with("source","destination")->get()]);


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
    public function store(Request $request)
    {
        //
        LinkedServer::create($request->all());
        return response()->json(["success"=>true,"message"=>"Linked server created successfully"],200);




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkedServer  $linkedServer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //4
        $linkedServer = LinkedServer::find($id);
        
        if($linkedServer == null) return response()->json(["linked server"=>null]);

        return response()->json(["linked server"=>$linkedServer->with("source","destination","affectation_access")->first()]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LinkedServer  $linkedServer
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkedServer $linkedServer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LinkedServer  $linkedServer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        LinkedServer::find($id)->update($request->all());
        return response()->json(["success"=>true,"message"=>"Linked server updated successfully"],200);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkedServer  $linkedServer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        LinkedServer::find($id)->delete();
        return response()->json(["success"=>true,"message"=>"Linked server deleted successfully"],200);


    }
}
