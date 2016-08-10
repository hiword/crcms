<?php
namespace User\Services;
use App\Services\Service;
use CrCms\Log\Interfaces\LogInterface;
use User\Models\AuthLog as AuthLogModel;
use App\Services\Traits\StoreTrait;
class AuthLog extends Service implements LogInterface 
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
    public function log(array $data)
    {
        // TODO Auto-generated method stub
        $this->model->name = $data['mixed'];
        $this->model->password = bcrypt($data['password']);
        $this->model->client_ip = $data['client_ip'];
        $this->builtModelStore();
        $this->model->save();
        return $this->model;
    }

}