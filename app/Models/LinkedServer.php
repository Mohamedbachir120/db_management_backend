<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server;
use App\Models\AffectationAccess;

class LinkedServer extends Model
{
    use HasFactory;

    public function source(){
        return $this->belongsTo(Server::class,'source_id');
    }
    public function destination(){

        return $this->belongsTo(Server::class,'destination_id');
    }
    
    public function affectation_access(){
        return $this->belongsToMany(AffectationAccess::class);
    }
}
