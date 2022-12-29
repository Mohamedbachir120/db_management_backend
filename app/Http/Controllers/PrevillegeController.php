<?php

namespace App\Http\Controllers;

use App\Models\Previllege;
use Illuminate\Http\Request;

class PrevillegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //:
        return response()->json(["previllege"=>Previllege::all()]);

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
        Previllege::create($request->all());
        return response()->json(["success" => true,"message"=>"previllege created successfully"],200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Previllege  $previllege
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return response()->json(["previllege"=>Previllege::find($id)],200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Previllege  $previllege
     * @return \Illuminate\Http\Response
     */
    public function edit(Previllege $previllege)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Previllege  $previllege
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Previllege::find($id)->update($request->all());

        return response()->json(["success" => true,"message"=>"previllege updated successfully"],200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Previllege  $previllege
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Previllege::find($id)->delete();
        return response()->json(["success" => true,"message"=>"previllege deleted successfully"],200);
    }
}
