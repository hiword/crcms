<?php
namespace Simon\Mail\Services\Mail;
use Simon\Mail\Services\Mail;
use Simon\Mail\Services\Mail\Interfaces\MailStoreInterface;
class MailStoreService extends Mail implements MailStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		return $this->model->create([
			'email'=>$data['email'],
			'subject'=>$data['subject'],
			'template'=>$data['template'],
			'content'=>view($data['template'],$data['data']),
		]);
	}

	
}