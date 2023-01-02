<?php

namespace App\Http\Helpers;

class SQLServerConnector
{

    public static function connect($host, $port, $user, $password, $database,$authType)
    {
        $serverName = $host."\\MSSQLSERVER, ".$port; //serverName\instanceName, portNumber (default is 1433)
        //0 for sqlserver authentication
        if($authType == 0){

            $connectionInfo = array( "Database"=>$database, "UID"=>$user, "PWD"=>$password);
        }
        else{

            $connectionInfo = array( "Database"=>$database);
        }

        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        return $conn;

    
    }
}