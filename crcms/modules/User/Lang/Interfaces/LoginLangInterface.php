<?php
namespace CrCms\User\Lang\Interfaces;
use CrCms\LangInterface;

interface LoginLangInterface extends LangInterface
{
	
	public function userNotExistsError() : string;
	
	public function passwordError() : string;
	
}