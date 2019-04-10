<?php

namespace SIAStar\Http\Controllers\API;

use Illuminate\Http\Request;
use SIAStar\Http\Controllers\Controller;
use Auth;

class APIAuthController extends Controller
{
    public function auth(Request $r)
    {
    	if(Auth::attempt(['username' => $r->username, 'password' => $r->password]))
    	{
    		$response['login']=true;
    		$response['user']=Auth::user();
    		$response['token']=Auth::user()->createToken('SIAStar Mobile')->accessToken;
    		return response()->json($response,200);
    	}
    	else
    	{
    		$response['login']=false;
    		return response()->json($response, 401);
    	}
    }
}
