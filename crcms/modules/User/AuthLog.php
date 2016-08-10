<?php
namespace CrCms\User;
use CrCms\CrCms;
use User\Services\AuthLog;

class AuthLog extends CrCms
{
    
    public  function __construct(AuthLog $service)
    {
        parent::__construct($service);
    }
    
    
    public function bootstrap(array $data)
    {
//         return $this->service->lo
    }
    
}