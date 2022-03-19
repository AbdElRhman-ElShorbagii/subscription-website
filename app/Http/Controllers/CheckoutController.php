<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout($price){
        if (Auth::guard('user')->check()) {
            return Redirect('/checkout');
        }
        return Redirect('/login');
    }
}
