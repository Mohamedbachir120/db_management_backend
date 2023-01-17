<?php

namespace App\Http\Controllers;

use App\Models\Sgbd;
use Illuminate\Http\Request;

class SgbdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request["keyword"] == "all"){
            return response()->json(["data"=>Sgbd::all()] ,200);

        }
        $sgbd =Sgbd::where("name","like","%".$request["keyword"]."%")
                ->orWhere("version","like","%".$request["keyword"]."%")
                ->paginate(10);
        return response()->json($sgbd ,200);
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
        Sgbd::create($request->all());
        return response()->json(["success"=>true,"message"=>"Sgbd created successfully"],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sgbd  $sgbd
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return response()->json(["sgbd"=>Sgbd::find($id)],200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sgbd  $sgbd
     * @return \Illuminate\Http\Response
     */
    public function edit(Sgbd $sgbd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sgbd  $sgbd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Sgbd::find($id)->update($request->all());
        return response()->json(["success"=>true,"message"=>"Sgbd updated successfully"],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sgbd  $sgbd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sgbd::find($id)->delete();
        return response()->json(["success"=>true,"message"=>"Sgbd deleted successfully"],200);

    }
}
