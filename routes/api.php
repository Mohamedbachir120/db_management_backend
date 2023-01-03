<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConnectorController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\AffectationAccessController;
use App\Http\Controllers\LinkedServerController;

use App\Http\Controllers\BddController;

use App\Http\Controllers\PrevillegeController;
use App\Http\Controllers\PopulationController;

use App\Http\Controllers\ProjectController;

use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\SgbdController;

use App\Http\Helpers\Crypto;
use App\Http\Helpers\SQLServerConnector;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('login');
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::get('/get_db',[ConnectorController::class,'save_db']);


Route::controller(AccessController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/access','index');
    Route::post('/access','store');
    Route::get('/access/{id}','show');
    Route::post('/access/{id}','update');
    Route::delete('/access/{id}','destroy');


});

Route::controller(AffectationAccessController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/affectation_access','index');
    Route::post('/affectation_access','store');
    Route::get('/affectation_access/{id}','show');
    Route::post('/affectation_access/{id}','update');
    Route::delete('/affectation_access/{id}','destroy');


});



Route::controller(BddController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/bdd','index');
    Route::post('/bdd','store');
    Route::get('/bdd/{id}','show');
    Route::post('/bdd/{id}','update');
    Route::delete('/bdd/{id}','destroy');


});


Route::controller(LinkedServerController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/linked_server','index');
    Route::post('/linked_server','store');
    Route::get('/linked_server/{id}','show');
    Route::post('/linked_server/{id}','update');
    Route::delete('/linked_server/{id}','destroy');


});

Route::controller(PopulationController::class)->middleware('auth:sanctum')->group(function(){
    Route::get('/population','index');
    Route::post('/population','store');
    Route::get('/population/{id}','show');
    Route::post('/population/{id}','update');
    Route::delete('/population/{id}','destroy');
});

Route::controller(PrevillegeController::class)->middleware('auth:sanctum')->group(function(){
    Route::get('/previllege','index');
    Route::post('/previllege','store');
    Route::get('/previllege/{id}','show');
    Route::post('/previllege/{id}','update');
    Route::delete('/previllege/{id}','destroy');  

});

Route::controller(ProjectController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/project','index');
    Route::post('/project','store');
    Route::get('/project/{id}','show');
    Route::post('/project/{id}','update');
    Route::delete('/project/{id}','destroy');
});

Route::controller(ResponsableController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/responsable','index');
    Route::post('/responsable','store');
    Route::get('/responsable/{id}','show');
    Route::post('/responsable/{id}','update');
    Route::delete('/responsable/{id}','destroy');     


});

Route::controller(ServerController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/server','index');
    Route::post('/server','store');
    Route::get('/server/{id}','show');
    Route::post('/server/{id}','update');
    Route::delete('/server/{id}','destroy');  

});

Route::controller(SgbdController::class)->middleware('auth:sanctum')->group(function(){

    Route::get('/sgbd','index');
    Route::post('/sgbd','store');
    Route::get('/sgbd/{id}','show');
    Route::post('/sgbd/{id}','update');
    Route::delete('/sgbd/{id}','destroy');  
});