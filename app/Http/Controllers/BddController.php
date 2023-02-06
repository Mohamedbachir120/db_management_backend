<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Bdd;
use Illuminate\Http\Request;

class BddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request["keyword"] == "all"){
            return response()->json(["data"=>Bdd::all()] ,200);

        }
        $bdd =Bdd::where("name","like","%".$request["keyword"]."%")
        ->orWhere("status","like","%".$request["keyword"]."%")
        ->orWhere("engine","like","%".$request["keyword"]."%")
        ->orWhereHas('server', function   (Builder $query) use ($request) {
            return  $query->where('dns',"like","%".$request["keyword"]."%");
        })
        ->with("sgbd","server")
     
        ->paginate(10);
        
        return response()->json($bdd,200);

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
        return response()->json(Bdd::find($id),200);
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
    public function access(Request $request,$id){

        $bdd = Bdd::find($id);
        return response()->json($bdd->accesses,200);
    }
    public function linkAccess(Request $request,$id){
        $bdd = Bdd::find($id);
        $bdd->accesses()->sync($request["access"]);
        return response()->json(['success' => true,"message" => "Bdd Updated Successfully"],200);

    }
}
