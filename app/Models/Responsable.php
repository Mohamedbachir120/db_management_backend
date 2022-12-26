<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Access;

class Responsable extends Model
{
    use HasFactory;

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    public function accesses() {
        return $this->belongsToMany(Access::class);
    } 
}
