<?php
namespace User\Services\Interfaces;
use CrCms\Log\Interfaces\LogInterface as ParentLogInterface;

interface LogInterface extends ParentLogInterface
{
    
    public function log(array $data,string $ip);
    
}