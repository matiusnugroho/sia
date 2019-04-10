<?php

namespace SIAStar\Http\Controllers\API;

use Illuminate\Http\Request;
use SIAStar\Http\Controllers\Controller;
use Auth;
use SIAStar\User;

class APITestController extends Controller
{
    public function auth()
    {
    	$response['login']=true;
            $response['user']=User::find(1);
            $response['token']="huahahah";
            return response()->json($response,200);
    }
}
