<?php
namespace Simon\Services;
use App\Services\Service;
use App\Services\Paginate;
class Document extends Service
{
	public function __construct()
	{
		$this->model = null;
	}
	
	public function documentList()
	{
		
	}
	
	public function documentPage($cid = 0)
	{
		$Paginate = new Paginate();
		
		if (!empty($cid) && is_numeric($cid))
		{
			$this->model = $Category->findOrFail($cid)->belongsToManyDocument();
		}
		
		$this->model = $this->model->where('status',1)->orderBy(Document::CREATED_AT,'desc');//->where('status',1);
		
		//附加内容
		if ($this->request->input('_content'))
		{
			foreach ($this->model as $model)
			{
				$model->hasOneDocumentData;
			}
		}
		
		$page = $Paginate->setUrlParams($this->data)->setPageSize(15)->page($this->model);
		return $this->response("index",$page);
	}
	
	
}