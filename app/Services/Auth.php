<?php
namespace App\Services;
use App\Services\Interfaces\AuthInterface;

class Auth implements AuthInterface
{
	
	protected $sessionKey = null;
	
	public function __construct($key) 
	{
		$this->sessionKey = $key;
	}
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\AuthInterface::id()
	 * @author simon
	 */
	public function id()
	{
		// TODO Auto-generated method stub
		return session($this->sessionKey)->id;
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\AuthInterface::logout()
	 * @author simon
	 */
	public function logout()
	{
		// TODO Auto-generated method stub
		session()->forget($this->sessionKey);
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\AuthInterface::store()
	 * @author simon
	 */
	public function store(\App\Models\Model $user)
	{
		// TODO Auto-generated method stub
		session()->put($this->sessionKey,$user);
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\AuthInterface::user()
	 * @author simon
	 */
	public function user()
	{
		// TODO Auto-generated method stub
		return session($this->sessionKey);
	}

	
	
}
