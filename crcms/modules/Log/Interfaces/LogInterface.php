<?php
namespace CrCms\Log\Interfaces;
use CrCms\CrCmsInterface;

interface LogInterface extends CrCmsInterface
{
	
	/**
	 * 日志存储接口
	 * @param array $data
	 * @author simon
	 */	
    public function log(array $data);
    
}


