<?php
namespace App\Forms;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidateException;
use App\Forms\Interfaces\FormInterface;
use Illuminate\Support\Facades\Input;
class Form {
	
	/**
	 * Validator Interface
	 * @param FormInterface $Rule
	 * @throws ValidateException
	 * @author simon
	 */
	public function validator(FormInterface $Rule,array $data = [])
	{
		$validator = Validator::make(empty($data) ? Input::all() : $data,$Rule->getRule());
		if ($validator->fails())
		{
			throw new ValidateException($validator);
		}
	}
	
	public function attr(FormInterface $Attr)
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