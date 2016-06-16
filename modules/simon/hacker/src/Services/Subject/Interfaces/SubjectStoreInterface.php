<?php
namespace Simon\Hacker\Services\Subject\Interfaces;
use App\Services\Interfaces\StoreInterface;
use Simon\Hacker\Models\Subject;
interface SubjectStoreInterface extends StoreInterface
{
	
	public function userSubjectStore(Subject $subject,array $data);
	
}