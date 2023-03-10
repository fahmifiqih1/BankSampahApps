<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function indexTransaction(){
        $user = Auth::user();
        $transactions = $user->transactions;
        return view('customer.indexTransaction', compact('transactions'));
    }
}
