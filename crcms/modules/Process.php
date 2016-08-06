<?php
namespace CrCms;
abstract class Process
{
	
	protected $service = null;
	
	protected $lang = null;
	
	public function __construct(ProcessInterface $service,LangInterface $lang = null)
	{
		$this->service = $service;
		$this->lang = $lang;
	}
	
}