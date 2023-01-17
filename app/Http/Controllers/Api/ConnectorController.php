<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\SQLServerConnector;
use App\Models\Server;
use App\Models\Bdd;


class ConnectorController extends Controller
{

    public function save_db(){
        $conn = SQLServerConnector::connect("ctrl-mgmt","1433","DBmgmt","eye0nD8@all+!mes","",0);
        if( $conn ) {
    
            $sql = "SELECT *  FROM msdb.dbo.sysmanagement_shared_registered_servers_internal;";
          
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            $result = [];
            $count= 0 ;
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $count+=1;
                $port = "1433";
                $server= $row["name"];
                if($row["name"] == "DBNAFTFINANCE" ) {
                    $port="25125";
                    
                }else if($row["name"] == "DGLE03PW19-01"){
                    $port = "22101";
                }
                
                else if($row["name"] == "DBNAFTFINANCEDV,53143"){
                    $port="53143";
                    $server="DBNAFTFINANCEDV";
                    
                }
             
                try {
                    
                    $dns = dns_get_record($server);
                    $row["ip"] = $dns[0]["ip"];
                    
                    //code...
                } catch (\Throwable $th) {
                    //throw $th;
                    $row["ip"]="";
                }
                // Server::create([
                // 'dns' => $server,
                // 'ip'=>$row["ip"],
                // "OSVersion"=>"Windows server 2016",
                // "instance_name"=>$server,
                // "port"=>$port,
                // "creation_date"=>"28-12-2022"]);
            if($count >= 35 ){
                
                $conn2 = SQLServerConnector::connect($server,$port,"naftal\sqladmin","$9L*D8@dm!","",1);
                if( $conn2 ) {
                $sql = "SELECT name, database_id, create_date  
                FROM sys.databases where name not in ('msdb','tempdb','model','master','distribution') ";
        
                $stmt2 = sqlsrv_query( $conn2, $sql );
                
                $result2 =[];
                while( $row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) {
                    
                $result2[] = $row2;
                $server_id = Server::where("dns",$server)->first();
                Bdd::create([
                    'name'=>$row2["name"],
                    'creation_date'=>$row2["create_date"]->format('Y-m-d H:i:s'),
                    'status'=>"enabled",
                    'engine'=>"InnoDB",
                    "sgbd_id"=>5,
                    "server_id"=>$server_id->id
                ]);
            
                }
                



                $row["databases"]= $result2;
    
                
                }
                
                $result[] = $row;
            }
            }
            return $result;
            sqlsrv_free_stmt( $stmt);
        }else{
             return "Connection could not be established.<br />";
             die( print_r( sqlsrv_errors(), true));
        }
    }

}