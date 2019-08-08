<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];
    
    public function categories() {
        return $this->belongsToMany('App\Category');
    }
    
    public function features() {
        return $this->belongsToMany('App\Feature');
    }
}
