<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Population extends Model
{
    use HasFactory;
    protected $fillable = ["designation"];
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
