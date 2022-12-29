<?php

namespace App\Http\Controllers;

use App\Models\AffectationAccess;
use Illuminate\Http\Request;

class AffectationAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(["affectation_access"=>AffectationAccess::all()],200);
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
        AffectationAccess::create([
            "access_id"=>$request["access_id"],
            "bdd_id"=>$request["bdd_id"]
        ]);
        return response()->json(["success"=>true,"message"=>"created successfully"],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AffectationAccess  $affectationAccess
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(["affectation_access"=>AffectationAccess::find($id)],200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AffectationAccess  $affectationAccess
     * @return \Illuminate\Http\Response
     */
    public function edit(AffectationAccess $affectationAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AffectationAccess  $affectationAccess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        AffectationAccess::where('id',$id)
            ->update([
            "access_id"=>$request["access_id"],
            "bdd_id"=>$request["bdd_id"]
        ]);
        return response()->json(["success"=>true,"message"=>"updated successfully"],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AffectationAccess  $affectationAccess
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        AffectationAccess::destroy($id);
        return response()->json(['success'=>true,"message"=>"deleted successfully"],200);
    }
}
