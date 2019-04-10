<?php
namespace SIAStar\Http\ViewComposers;
use Illuminate\View\View;
use Auth;

class NotificationComposer
{
	
	public function compose(View $view)
	{
		$role = Auth::user()->role;
		$notif = Auth::user()->{$role}->notifications()->paginate(10);
		$unread = Auth::user()->{$role}->unreadNotifications;
		$unreadBade = count($unread);
		if($unreadBade==0)$unreadBade="";
		$view->with('notif',$notif)->with('unreadBade',$unreadBade);
	}
}