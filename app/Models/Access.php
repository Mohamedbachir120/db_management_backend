<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bdd;
use App\Models\LinkedServer;
use App\Models\Responsable;

class Access extends Model
{
    use HasFactory;

    protected $hidden = [
        'pwd',
        'remember_token',
    ];

    public function bdds(){
        return $this->belongsToMany(Bdd::class);
    }
    
    public function linked_servers(){
        return $this->hasMany(LinkedServer::class);
    }

    public function responsables(){
        return $this->belongsToMany(Responsable::class);
    }


  
    
}
