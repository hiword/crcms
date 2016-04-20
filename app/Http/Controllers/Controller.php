<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Forms\Form;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * 
     * @var Illuminate\Http\Request
     * @author simon
     */
    protected $request = null;
    
    /**
     * 
     * @var Service $service
     * @author simon
     */
    protected $service = null;
    
    /**
     * 
     * @var App\Forms\Form
     * @author simon
     */
    protected $form = null;
    
    
    /**
     * 
     * @var array
     * @author simon
     */
    protected $data = [];
    
    /**
     * 
     * @var string
     * @author simon
     */
    protected $view = null;
    
    
    protected $redirectUrl = null;
    
    
    public function __construct()
    {
    	$this->request = app('request');
    	
    	$this->data = clean_xss($this->request->all());
    	
    	$this->form = app('App\Forms\Form');
    	
    	DB::enableQueryLog();
    }
    
    /**
     *
     * @param array $options
     * @param string $actionLog
     * @author simon
     */
    protected function logs(array $data)
    {
    	if (module_exists('log'))
    	{
    		action_log($data);
    	}
    	
    	return $this;
    }
    
    protected function view($view,array $data = [],array $mergeData = [])
    {
    	return view($this->view.$view,$data,$mergeData);
    }
    
    protected function response($status,$data = [],$url = null) 
    {
    	return responding($status,$data,$url);
    }
}
