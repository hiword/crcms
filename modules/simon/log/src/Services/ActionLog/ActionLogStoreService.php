<?php
namespace Simon\Log\Services\ActionLog;
use Simon\Log\Services\ActionLogCudService;
use App\Services\Interfaces\StoreInterface;
class ActionLogStoreService extends ActionLogCudService implements StoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		$this->model->url = $data['url'];
		$this->model->method = $data['method'];
		$this->model->scheme = $data['scheme'];
		$this->model->port = $data['port'];
		$this->model->client_ip = $data['client_ip'];
		$this->model->device = $data['device'];
		$this->model->browser = $data['browser'];
		$this->model->browser_version = $data['browser_version'];
		$this->model->os = $data['os'];
		$this->model->os_version = $data['os_version'];
		$this->model->is_robot = $data['is_robot'];
		$this->model->robot_name = $data['robot_name'];
		$this->model->remark = $data['remark'];
		$this->model->created_uid = $data['created_uid'];
		$this->model->created_type = $data['created_type'];
		
		return $this->model->save();
	}

	
}