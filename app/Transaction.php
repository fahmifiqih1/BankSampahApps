<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    
    const CREATED_AT = 'tanggal';
    const UPDATED_AT = 'updated_at';


    public function allData(){
        return DB::table('transactions')
        ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
        ->leftJoin('admins', 'admins.id', '=', 'transactions.admin_id')
        ->orderBy('tanggal', 'desc')->paginate(2);
    }
    
    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
    
    public function trash(){
        return $this->belongsTo('App\Trash');
    }

    // public function users(){
    //     return $this->belongsTo('App\User', 'user_id');
    // }
}
