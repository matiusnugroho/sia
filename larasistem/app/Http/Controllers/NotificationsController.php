<?php

namespace SIAStar\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    private $user;
    private $role;
    private $id;
    private $saya;
    public function __construct()
    {
        //$this->middleware('SIAStar\Http\Middleware\AksesRekapNilai');
        $this->middleware(function ($request, $next) {
            $this->getUserData();
            return $next($request);
        });
    }
    public function getUserData()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->role = $user->role;
        $this->saya = $user->{$user->role};
        $this->id = $user->guru==null?$user->siswa->nis:$user->guru->nip;
    }

    public function markAsRead(Request $r, $id)
    {
    	$notif = $this->saya->notifications()->where('id',$id)->first();
    	$notif->markAsRead();
    	if($r->ajax())
    	{
    		return $notif;
    	}
    	return redirect(url($notif->data['link']));
    }

    public function getUnread(Request $r)
    {
    	
    		$data = [];
    		$notif = $this->saya->unreadNotifications;
    		$semua = $this->saya->notifications()->paginate(10);
    		if ($notif->count()>0)
    		{
    			$data['baru']=true;
    			$data['n']=$notif->count();
    			$data['notifikasi'] = $semua;
    			$html="";
    			foreach ($semua as $notifi) 
    			{
    				$class = $notifi->read_at!=null?"text-muted":"text-primary";
    				$html.="<li><a href='".url($notifi->data['link'])."' id='".$notifi->id."' class='link-notif'><div class='".$class."'><i class='fa fa-envelope fa-fw'></i>".$notifi->data['pesan']."<span class='pull-right text-muted small'>bhy</span></div></a></li>";
    			}
    			$data['html']=$html;
    		}
    		else
    		{
    			$data['baru']=false;
    		}
    		return $data;
    	
    }
}
