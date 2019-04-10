<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApiLoginController extends Controller
{
    public function login(Request $r)
    {
    	$a=Auth::attempt(['username' => $r->username, 'password' => $r->password]);
    	if($a)
    	{
    		$data['login']=true;
    		$data['secretKey']='AbcD1278';
    	}
    	else
    	{
    		$data['login']=false;
    	}
    	return $data;
    }
}
