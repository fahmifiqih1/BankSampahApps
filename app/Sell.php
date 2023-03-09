<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sell extends Model
{

    const CREATED_AT = 'tanggal';
    const UPDATED_AT = 'updated_at';
    
    protected $guarded = [];

    public function allData(){
        return DB::table('sells')
        ->leftJoin('trashes', 'trashes.id', '=', 'sells.trash_id')
        ->leftJoin('collectors', 'collectors.id', '=', 'sells.collector_id')
        ->orderBy('tanggal', 'desc')->paginate(2);
    }

    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
