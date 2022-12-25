<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Responsable;
class Project extends Model
{
    use HasFactory;

    public function responsables(){
        return $this->belongsToMany(Responsable::class);
    }
    
}
