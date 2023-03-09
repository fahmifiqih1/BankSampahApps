<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\User', 'transactions', 'trash_id', 'user_id');
    }
    
}
