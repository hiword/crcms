<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Services\Service;
abstract class Auth extends Service
{
	
// 	protected $model = null;
	
// 	public function __construct(Model $model = null,array $data = [])
// 	{
// 		parent::__construct($data);
// 		$this->model = $model;
// 	}
	
	
	abstract public function validate();
	
	abstract public function execute();
}
