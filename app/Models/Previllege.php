<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AffectationAccess;
class Previllege extends Model
{
    use HasFactory;
    protected $fillable = ["name","withGrant","securable"];
    public function affectation_accesses(){
        
        return $this->belongsToMany(AffectationAccess::class);
    }
}
