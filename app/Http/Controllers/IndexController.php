<?php
namespace App\Http\Controllers;
class IndexController extends Controller
{
	public function getIndex() 
	{
		return redirect('/hacker/index');
	}	
}