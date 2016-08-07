<?php
namespace CrCms;
abstract class CrCms
{
	
	protected $service = null;
	
	public function __construct(CrCmsInterface $service)
	{
		$this->service = $service;
	}
	
}