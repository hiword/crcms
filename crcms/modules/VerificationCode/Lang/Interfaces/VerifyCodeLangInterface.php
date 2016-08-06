<?php
namespace CrCms\VerificationCode\Lang\Interfaces;
use CrCms\LangInterface;

interface VerifyCodeLangInterface extends LangInterface
{
	
	public function codeImageError() : string;
	
	public function codeMobileError() : string;
	
	public function codeEmailError() : string;
	
}