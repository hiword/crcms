<?php
namespace App\Forms;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidateException;
use App\Forms\Rules\Interfaces\RuleInterface;
abstract class Form {
	
	protected $rule = [];
	
	protected $attr = [];
	
	protected $request = null;
	
	public function __construct()
	{
		$this->request = app('request');
	}
	
	/**
	 * Public Validator Rule
	 * 
	 * @author simon
	 */
// 	abstract protected function publicRule();
	
	/**
	 * Validator Interface
	 * @throws ValidateException
	 * @author simon
	 */
	public function validator(RuleInterface $Rule)
	{
		$validator = Validator::make($this->request->all(),$Rule->getRule());
		if ($validator->fails())
		{
			throw new ValidateException($validator);
		}
	}
	
	public function attr()
	{
		
	}
	
// 	protected function actionRule()
// 	{
// 		$controller = str_replace([$action['namespace'].'\\','Controller'], '', $this->request->route()->getAction()['controller']);
// 		$controller = explode('@', $controller);
// 		return camel_case(str_replace('\\', '_', $controller[0]).'_'.$controller[1]);
// 	}
	
	/**
	 * Get Validator Rule
	 * 
	 * @author simon
	 */
// 	protected function getRule()
// 	{
// 		if ($this->rule)
// 		{
// 			$rule = $this->rule;
// 		}
// 		elseif (method_exists($this, 'rule'))
// 		{
// 			$rule = $this->rule();
// 		}
// 		elseif ((boolean)$rule = $this->actionRule() && method_exists($this, $rule))
// 		{
// 			$rule = $this->$rule();
// 		}
// 		else
// 		{
// 			$rule = [];
// 		}
// 		return $rule;
// 	}
}