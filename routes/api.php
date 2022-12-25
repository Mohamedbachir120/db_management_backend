<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Helpers\Crypto;

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
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::get('/test_cnx', function () {
    $serverName = "ctrl-mgmt.naftal.local\\MSSQLSERVER, 1433"; //serverName\instanceName, portNumber (default is 1433)
    $connectionInfo = array( "Database"=>"msdb", "UID"=>"DBmgmt", "PWD"=>"eye0nD8@all+!mes");

    // $serverName = "DBSQLIMMO.naftal.local\\MSSQLSERVER, 1433"; //serverName\instanceName, portNumber (default is 1433)
    // $connectionInfo = array( "Database"=>"DBinventaire", "UID"=>"adminInv", "PWD"=>"!2NV-adm*22");
    // $host="DWRH";
    // exec("nslookup " . $host, $output, $result);

    // return ($output);
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) {
        $sql = "SELECT *  FROM msdb.dbo.sysmanagement_shared_registered_servers_internal;";

        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        $result = [];
        $count = 0  ;
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $result[] = $row;
        }
        sqlsrv_free_stmt( $stmt);
        return $result;
        // return json_encode( $result );
    }else{
         return "Connection could not be established.<br />";
         die( print_r( sqlsrv_errors(), true));
    }

   

    
});

Route::get('/test_ecryption', function () {
    
    $message = 'Ready your ammunition; we attack at dawn.';
    $encrypted = Crypto::encrypt($message);
    $decrypted = Crypto::decrypt($encrypted);

    return $decrypted;
    
});