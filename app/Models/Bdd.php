<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Sgbd;
use App\Models\Server;
use App\Models\Access;
class Bdd extends Model
{
    use HasFactory;
    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function sgbd(){
        return $this->belongsTo(Sgbd::class);

    }
    public function server(){
        return $this->belongsTo(Server::class);
    }
    public function accesses(){

        return $this->belongsToMany(Access::class);
    }


}
