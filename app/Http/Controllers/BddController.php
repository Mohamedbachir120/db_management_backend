<?php

namespace App\Http\Controllers;

use App\Models\Bdd;
use Illuminate\Http\Request;

class BddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(["bdd"=>Bdd::all()],200);
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
        Bdd::create([
            'name'=>$request["name"],
            'creation_date'=>$request["creation_date"],
            'status'=>$request["status"],
            'engine'=>$request["engine"],
            "sgbd_id"=>$request["sgbd_id"],
            "server_id"=>$request["server_id"]
        ]);
        return response()->json(["success"=>true,"message"=>"created successfully"],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bdd  $bdd
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(["bdd"=>Bdd::find($id)],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bdd  $bdd
     * @return \Illuminate\Http\Response
     */
    public function edit(Bdd $bdd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bdd  $bdd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Bdd::where("id",$id)->update([
            'name'=>$request["name"],
            'creation_date'=>$request["creation_date"],
            'status'=>$request["status"],
            'engine'=>$request["engine"],
            "sgbd_id"=>$request["sgbd_id"],
            "server_id"=>$request["server_id"]
        ]);
        return response()->json(["success"=>true,"message"=>"updated successfully"],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bdd  $bdd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Bdd::destroy($id);
        return response()->json(["success"=>true,"message"=>"deleted successfully"],200);

    }
}
