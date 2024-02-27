<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    public function images(){
    	return $this->hasMany(ProjectImage::class);
    }
    

    public function donations(){
    	return $this->hasMany(Donation::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class, 'category_id');
    }

     public function user(){
        return $this->belongsTo(User::class);
    }
}
