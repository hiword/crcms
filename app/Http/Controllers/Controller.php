<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\Service;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * 
     * @var Service $service
     * @author simon
     */
    protected $service = null;
    
    protected $request = null;
    
    protected $data = [];
    
    protected $view = null;
    
    public function __construct()
    {
    	$this->request = app('request');
    	
    	$this->data = $this->request->all();
    }
    
    protected function view($view,$prefix = null)
    {
    	return view($this->view.$view);
    }
    
}
