<?php
namespace Simon\Hacker\Services;
use App\Services\Service;
use Simon\Hacker\Models\Subject as SubjectModel;
abstract class Subject extends Service
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Service::__construct()
	 * @author simon
	 */
	public function __construct(SubjectModel $Subject)
	{
		parent::__construct();
		$this->model = $Subject;
	}

	
}