<?php

namespace SIAStar\Http\Controllers\API;

use Illuminate\Http\Request;
use Auth;
use SIAStar\User;
use SIAStar\Http\Controllers\Controller;

class InfoAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $anak = Auth::user()->ortu->anak;
        $anak->load('user','lokal.guru','lokal.kelas','pa');
        return response()->json(['anak'=>$anak],200);
    }
}
