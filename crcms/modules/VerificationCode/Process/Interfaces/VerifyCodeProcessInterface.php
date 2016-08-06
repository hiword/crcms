<?php
namespace CrCms\VerificationCode\Process\Interfaces;
use CrCms\ProcessInterface;

interface VerifyCodeProcessInterface extends ProcessInterface
{
	
	public function verifyImageCode(string $code) : bool;
	
	public function verifyMobileCode(string $code) : bool;
	
	public function verifyEmailCode(string $code) : bool;
}