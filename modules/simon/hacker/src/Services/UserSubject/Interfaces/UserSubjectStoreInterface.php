<?php
namespace Simon\Hacker\Services\UserSubject\Interfaces;
use Simon\Hacker\Models\Subject;
interface UserSubjectStoreInterface
{
	
	public function store(Subject $subject,array $data); 
	
}