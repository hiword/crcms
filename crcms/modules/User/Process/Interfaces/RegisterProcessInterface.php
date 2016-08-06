<?php
namespace CrCms\User\Process\Interfaces;
use CrCms\ProcessInterface;

interface RegisterProcessInterface extends ProcessInterface
{
	public function register(array $data);
}