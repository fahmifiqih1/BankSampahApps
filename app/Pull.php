<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pull extends Model
{
    protected $guarded = [];

    const CREATED_AT = 'tanggal';
    const UPDATED_AT = 'updated_at';
    
    public function allData(){
        return DB::table('pulls')
        ->leftJoin('users', 'users.id', '=', 'pulls.user_id')
        ->orderBy('tanggal', 'desc')->paginate(2);
    }

    // orderBy('created_at', 'desc')->paginate(5);

    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
