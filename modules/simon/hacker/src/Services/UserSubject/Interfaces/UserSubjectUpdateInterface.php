<?php
namespace Simon\Hacker\Services\UserSubject\Interfaces;
use Simon\Hacker\Models\Subject;
interface UserSubjectUpdateInterface
{
	
	public function update(Subject $subject,array $data); 
	
}