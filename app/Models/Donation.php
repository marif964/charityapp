<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function project(){
    	return $this->belongsTo(Project::class);
    }

    public function doner(){
    	return $this->belongsTo(Doner::class);
    }
}
