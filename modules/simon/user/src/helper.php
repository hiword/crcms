<?php
function userinfo($userId)
{
	$user = \Simon\User\Models\User::where('id',$user)->find();
	if (empty($user)) 
	{
		$user = new \stdClass();
		$user->name = '游客';
	}
	return $user;
}