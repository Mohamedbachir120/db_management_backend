<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LinkedServer;
use App\Models\Bdd;
use App\Models\Access;
use App\Models\Previllege;

class AffectationAccess extends Model
{
    use HasFactory;

    protected $fillable = ['access_id','bdd_id'];

    public function linked_servers(){
        return $this->belongsToMany(LinkedServer::class);
    }

    public function bdd(){
        return $this->belongsTo(Bdd::class);
    }

    public function access(){
        return $this->belongsTo(Access::class);
    }

    public function previlleges(){
        return $this->belongsToMany(Previllege::class);
    }    


}
