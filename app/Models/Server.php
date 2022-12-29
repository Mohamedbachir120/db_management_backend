<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bdd;
use App\Models\LinkedServer;

class Server extends Model

{
    use HasFactory;

    protected $fillable = ['dns','ip','OSVersion','instance_name','port','creation_date'];

    public function bdds(){
        return $this->hasMany(Bdd::class);
    }

    public function destinations(){
        return $this->hasMany(LinkedServer::class,'destination_id');
    }
    
    public function sources(){
        return $this->hasMany(LinkedServer::class,'source_id');
    }
}
