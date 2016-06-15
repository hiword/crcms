<?php
namespace Simon\User\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Facades\Auth;
class UserController extends Controller
{
	
	public function getIndex() 
	{
		//dd(Auth::user());
		return redirect('hacker/index');
	}
	
}