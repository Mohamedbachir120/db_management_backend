<?php

namespace App\Http\Controllers;

use App\Models\Population;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request["keyword"] == "all"){
            return response()->json(["data"=>Population::with("projects")->get()] ,200);

        }
        $population =Population::where("designation","like","%".$request["keyword"]."%")
                ->with('projects')
                ->paginate(10);
        return response()->json($population ,200);
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
        Population::create($request->all());

        return response()->json(["success"=>true,"message"=>"Population created successfully"],200);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $population = Population::find($id);

        return response()->json(["population"=>$population],200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function edit(Population $population)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Population::find($id)->update($request->all());

        return response()->json(["success"=>true,"message"=>"Population updated successfully"],200);
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Population  $population
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Population::find($id)->delete();
        return response()->json(["success"=>true,"message"=>"Population deleted successfully"],200);
        
    }
}
