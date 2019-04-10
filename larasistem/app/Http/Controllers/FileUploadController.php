<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $r)
    {
    	return $this->{'upload'.$tipe}();
    }

    public function uploadpp(Request $r)
    {
    	$pp = $r->file('pp');
    	$ext = $pp->extension();
        $namafile = $request->username."_pp.".$ext;
        $request->file('pp')->move('img/'.$request->username,$namafile);
    }
}
