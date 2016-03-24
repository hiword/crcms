<?php
namespace App\Forms;
use App\Forms\Interfaces\FormInterface;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidateException;
use Illuminate\Http\JsonResponse;
abstract class Form
{
	
	protected $request = null;
	
	public function __construct()
	{
		$this->request = app('request');
	}
	
	public function validate()
	{
		$validator = Validator::make($this->request->all(),$this->rule());

        if ($validator->fails())
        {
        	if (($this->request->ajax() && ! $this->request->pjax()) || $this->request->wantsJson())
        	{
        		$response = new JsonResponse($validator->errors()->getMessages()[0],422);
        	}
        	else
        	{
        		$response = redirect()->back()->withErrors($validator)->withInput();
        	}
        	throw new ValidateException('abc',$response);
        }
        
        return $this;
	}
}