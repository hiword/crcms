<?php
namespace User\Services;
use App\Services\Service;
use CrCms\Log\Interfaces\LogInterface;
use User\Models\AuthLog as AuthLogModel;
use App\Services\Traits\StoreTrait;
class AuthLog extends Service implements \User\Services\Interfaces\LogInterface 
{
    
    use StoreTrait;
    
    public function __construct(AuthLogModel $log)
    {
        parent::__construct($log);
    }
    /**
     * {@inheritDoc}
     * @see \User\Services\Interfaces\LogInterface::log()
     */
    public function log(array $data,string $ip)
    {
        // TODO Auto-generated method stub
        $this->model->name = $data['mixed'];
        $this->model->password = bcrypt($data['password']);
        $this->model->client_ip = ip_long(app('request')->ip());
        $this->builtModelStore();
        $this->model->save();
        return $this->model;
    }

}