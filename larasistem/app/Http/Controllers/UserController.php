<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use SIAStar\Http\Requests;
use SIAStar\Http\Requests\UserFormRequest;
use SIAStar\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $role;
    public function __construct()
    {
        //$this->role=Auth::user()->role;
        $this->middleware('adminakses');
        
    }
    public function index()
    {
        $user = User::paginate(20);
        $roleTextView ='Semua Role';
        //return dd(Auth::user()->role);
        return view('admin.user.index',compact('user','roleTextView'));
    }
    public function cari(Request $request)
    {
        $kategori = $request['role'];
        $role = ['','admin','guru','siswa'];
        $roleText=['Semua Role',"Admin","Guru","Siswa"];
        $limit = $request['limit'];
        $q = $request['q'];
        $roleTextView = $roleText[$kategori];
            
        $user = User::where('role','like','%'.$role[$kategori].'%')->where(function($qu) use ($q) {
            $qu->where('id','like','%'.$q.'%')->orWhere('username','like','%'.$q.'%');
        })->paginate($limit);
        $user->setPath('cari?role='.$kategori.'&limit='.$limit.'&q='.$q);
        return view('admin.user.index',compact('user','roleTextView'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.tambah');
    }

    public function CreatevalidasiInput(Request $request)
    {
        $rule = [
            'username'=>'required|unique:users,username',
            'email'=>'required',
            'password'=>'required',
            'pp'=>'image'
        ];
        $pesan = [
            'username.required'=>'username tidak boleh kosong',
            'username.unique'=>'Username telah dipakai oleh orang lain',
            'email.required'=>'Email tidak boleh kosong',
            'password.required'=>'password tidak boleh kosong',
            'pp.image'=>'File bukan merupakan gambar'
        ];
        $validator = Validator::make($request->all(),$rule,$pesan);
        return $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->CreatevalidasiInput($request);
        //return dd($validator->errors());
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('data',$request->all());
        }
       /* $data=[];
        $n = $request->ndata;
        //return dd($request->all());
        //Membuat data yang di-batch input menjadi sebuah objek agar mudah diolah dan readability coding, performance? who knows :p
        for ($i=0; $i < $n; $i++) { 
            $isi['id']=$request->username[$i];
            $isi['email']=$request->email[$i];
            $isi['role']=$request->role[$i];
            $isi['password']=$request->password[$i];
            //$isi['foto']=$request->pp[$i];
            $data[]=$isi;
        }
        return dd($data);
        //Mengolah data input
        foreach ($data as $input) {
            $user = new User();
            $user->username = $input['id'];
            $user->email = $input['email'];
            $user->password = Hash::make($input['password']);
            $user->role = $input['role'];
            if ($input['foto']!=null){
                $input['foto']->move('ujicoba',"pp_".$input['id'].".jpg");
                $user->pp = "pp_".$input['id']."jpg";
            }
            else {
                $user->pp="";
            }
            $user->save();
        }*/

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $pp = $request->file('pp');
        $user->role = 'admin';
        if ($request->file('pp')!=null){
            $ext = $pp->extension();
            $namafile = $request->username."_pp.".$ext;
            //$request->file('pp')->move('img/'.$request->username,$namafile);
			$request->file('pp')->storeAs('img/'.$request->username,$namafile);
			
            $user->pp = $namafile;
        }
        $user->save();

        return redirect('user')->with('sukses','Data user telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $user = User::find($id);
        $userRole = $user->role;
        $userDetail = $user->$userRole;
        return view('admin.user.detail'.$userRole,compact('user','userDetail'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $user= User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        if(!is_null($request->password_new)){
            $user->password = Hash::make($request->password_new);
        }
        $user->save();
        $pesan="Data berhasil diupdate";
        return redirect('user/'.$id)->with(compact('pesan'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
