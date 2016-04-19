<?php
namespace Simon\Mail\Services;
use App\Services\Service;
use Simon\Mail\Models\Mail as MailModel;
abstract class Mail extends Service
{
	
	public function __construct(MailModel $Mail)
	{
		parent::__construct();
		$this->model = $Mail;
	}
	
}