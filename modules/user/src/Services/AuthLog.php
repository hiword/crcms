<?php
namespace User\Services;
use App\Services\Service;
use User\Models\AuthLog as AuthLogModel;
use App\Services\Traits\StoreTrait;
use CrCms\User\Interfaces\AuthLogInterface;
class AuthLog extends Service implements AuthLogInterface 
{
    
    use StoreTrait;
    
    public function __construct(AuthLogModel $log)
    {
        parent::__construct($log);
    }
    /**
     * {@inheritDoc}
     * @see \CrCms\User\Interfaces\AuthLogInterface::log()
     */
    public function log(int $type, array $data)
    {
        // TODO Auto-generated method stub

        $this->model->type = $type;
        $this->model->name = $data['name'];
        $this->model->userid = bcrypt($data['userid']);
        $this->model->client_ip = $data['client_ip'];
        $this->builtModelStore();
        $this->model->save();
        return $this->model;
    }


    
}