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
    public function index(Request $request)
    {
        //:
        if($request["keyword"] == "all"){
            return response()->json(["data"=>Previllege::all()] ,200);

        }
        $previllege =Previllege::where("name","like","%".$request["keyword"]."%")
                ->orWhere("securable","like","%".$request["keyword"]."%")
                ->paginate(10);
        return response()->json($previllege ,200);

    }

    public function show($id)
    {
        //
        $previllege = Previllege::find($id);
        return response()->json($previllege,200);


    }
    public function linkAccess(Request $request,$id){
        $previllege = Previllege::find($id);
        $previllege->accesses()->sync($request["access"]);
        return response()->json(['success' => true,"message" => "previllege Updated Successfully"],200);

    }
    public function getLinkedAccess(Request $request,$id){
        $previllege = Previllege::find($id);
        return response()->json($previllege->accesses,200);
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
