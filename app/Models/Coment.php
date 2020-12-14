<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;
    
     protected $table = 'coment';
     
     
     protected $fillable = ['idpost', 'text', 'date', 'email'];
     
     
     public function post() {
        return $this->belongsTo('App\Models\Post', 'idpost');
       
    }
}
