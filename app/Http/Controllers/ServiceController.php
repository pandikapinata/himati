<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Auth;

class ServiceController extends Controller
{
    public function checkAuth(){
    	$user_log = Guest::all()->where('id', Auth::guard('guest')->user()->id)->first();
    	if( $user_log->priv_id == 1 ){
    		return redirect('/');
    	}else if( $user_log->priv_id == 2 ){
    		return redirect('/rental');
    	}else{
    		return '404 Forbidden';
    	}
    }


}
