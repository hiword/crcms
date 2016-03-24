<?php
namespace Simon\Document\Forms;
use App\Forms\Form;
use App\Forms\Interfaces\FormInterface;
class Category extends Form implements FormInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::attr()
	 * @author simon
	 */
	public function attr()
	{
		// TODO Auto-generated method stub
		
	}

	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::rule()
	 * @author simon
	 */
	
	protected function manageCategoryPostStore()
	{
		
	}
	
	public function rule()
	{
		// TODO Auto-generated method stub
		
		$action = $this->request->route()->getAction();
		$controller = str_replace([$action['namespace'].'\\','Controller'], '', $action['controller']);
		
		$controller = explode('@', $controller);
		$controller = camel_case(str_replace('\\', '_', $controller[0]).'_'.$controller[1]);

		if (method_exists($this, $controller))
		{
			return $this->$controller();
		}
		
		dd(camel_case($controller));
// 		dd(
// 			$this->request->root(),
// 			$this->request->url(),
// 			$this->request->fullUrl(),
// 			$this->request->path(),
// 			get_class($this->request->route()),
// 			$this->request->route()->getName(),
// 			$this->request->route()->getActionName(),
// 			,
// 			$this->request->route()->getMethods(),
// 			$this->request->route()->getPath()
// 		);
	}

	
	
	
}