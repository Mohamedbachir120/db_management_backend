<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responsable;
use App\Models\Population;
class Project extends Model
{
    use HasFactory;

    public function responsables(){
        return $this->belongsToMany(Responsable::class);
    }
    public function populations(){
        return $this->belongsToMany(Population::class);
    }
    
}
