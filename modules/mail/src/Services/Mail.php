<?php
namespace Mail\Services;
use App\Services\Service;
use CrCms\Mail\Interfaces\MailInterface;
use App\Services\Traits\StoreTrait;
use Mail\Models\Mail;

class Mail extends Service implements MailInterface
{
	use StoreTrait;
	
	public function __construct(Mail $model)
	{
		parent::__construct($model);
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\Mail\Interfaces\MailInterface::log()
	 * @author simon
	 */
	public function log(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->email = $data['email'];
		$this->model->subject = $data['subject'];
		$this->model->template = $data['template'];
		$this->model->content = view($data['template'],$data['data']);
		
		$this->model->save();
		
		return $this->model;
	}

	/* 
	 * (non-PHPdoc)
	 * @see \CrCms\Mail\Interfaces\MailInterface::sendMail()
	 * @author simon
	 */
	public function sendMail(string $to, string $subject, string $template, array $data): bool
	{
		// TODO Auto-generated method stub
		\Illuminate\Support\Facades\Mail::send($template, $data, function($message) use ($to,$subject,$data)
		{
			$message->to($to, $data['name'] ?? null)->subject($subject);
		});
		
		return true;
	}

	
	
	
}
