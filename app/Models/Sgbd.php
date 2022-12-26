<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bdd;

class Sgbd extends Model
{
    use HasFactory;

    public function bdds(){
        return $this->hasMany(Bdd::class);
    }
}
