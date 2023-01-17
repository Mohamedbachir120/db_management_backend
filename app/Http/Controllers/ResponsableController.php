<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request["keyword"] == "all"){
            return response()->json(Responsable::all() ,200);

        }
        $sgbd =Responsable::where("name","like","%".$request["keyword"]."%")
                            ->orWhere("email","like","%".$request["keyword"]."%")
                            ->orWhere("phone","like","%".$request["keyword"]."%")
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
        Responsable::create($request->all());

        return response()->json(["message"=>"Responsable was created successfully"], 200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $responsable = Responsable::find($id);

        return response()->json(["responsable"=>$responsable],200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $responsable = Responsable::find($id);
        $responsable->update($request->all());

        return response()->json(["message"=>"Responsable was updated successfully"], 200);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $responsable = Responsable::find($id);
        $responsable->delete();

        return response()->json(["message"=>"Responsable was deleted successfully"], 200);



    }
}
