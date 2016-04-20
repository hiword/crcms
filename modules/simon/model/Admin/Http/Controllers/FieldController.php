<?php
namespace Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\ControllerTrait;
use Admin\Models\Field;
use CrCms\Services\Basic\Search;
use CrCms\Services\Basic\Paginate;
class FieldController extends Controller {
	
	use ControllerTrait;
	
	protected function initialization() 
	{
		
		if (empty($this->param['model_id']))
		{
			$this->throwError(['error','app.param_loss']);
		}
		
		$this->model = new Field();
		$this->field = new \Admin\Fields\Field();
		parent::initialization();
		$this->view = 'field';
		
		view()->share([
				'model_id'=>intval($this->param['model_id']),
		    'status'=>[1=>'开启',2=>'关闭'],
		]);
	}
	
	public function index()
	{
	    $data = $this->model->where('model_id',$this->param['model_id'])->orderBy('created_at','desc')->get();
	    
	    return $this->response("{$this->view}.index",['data'=>$data]);
	}
	
	protected function setAttributes()
	{
		return $this->attributes = ['name','relation','model_id','type','setting','sort','length','field_option','status','default_value',];
	}
	
	/**
	 * 创建界面展示
	 */
	public function create()
	{
		return $this->setToken($this->param['model_id'])->response("{$this->view}.create",['data'=>$this->model]);
	}
	
	public function store() 
	{
		$this->validateToken($this->param['model_id'])->attributes($this->setAttributes())->validate()->storeData();
	
		return $this->response(['success']);
	}
	
	/**
	 * 数据编辑界面展示
	 * @param numeric $id
	 */
	public function edit($id)
	{
		$id = intval($id);
		
		$this->model = $this->model->find($id);
	
		$this->setToken((string)$id.$this->param['model_id']);
	
		$this->model->field_option = json_decode($this->model->field_option);
		$this->model->setting = json_decode($this->model->setting);
		
		return $this->response("{$this->view}.edit",['data'=>$this->model]);
	}
	
	public function show($id)
	{
	    
	    $this->model = $this->model->find($id);
	
	    $this->model->field_option = json_decode($this->model->field_option);
	    $this->model->setting = json_decode($this->model->setting);
	    
	    $this->setToken();
	
	    if ($this->request->ajax() || $this->request->wantsJson())
	    {
	        return $this->response(['success'],['data'=>$this->model]);
	    }
	    else
	    {
	        return $this->response("{$this->view}.show",['data'=>$this->model]);
	    }
	}
	
	
	/**
	 * 数据修改
	 * @param numeric $id
	 */
	public function update($id)
	{
	
		$this->validateToken($id.$this->param['model_id'])->attributes($this->setAttributes())->validate();
		
		$this->updateData();
	
		return $this->response(['success']);
	}
	
}