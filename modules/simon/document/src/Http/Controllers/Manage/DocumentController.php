<?php
namespace Simon\Document\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Document\Fields\Document\Status;
use Simon\Document\Models\Category;
use Simon\Tag\Events\TagOutside;
use Simon\Document\Models\Document;
use Simon\Document\Models\DocumentData;
use App\Services\Paginate;
use Simon\Document\Models\CategoryDocument;
use Simon\File\Events\ImageOutside;
class DocumentController extends Controller
{
	
	public function __construct(Category $Category,Document $Document)
	{
		
		parent::__construct();
		
		$this->middleware('Simon\System\Http\Middleware\Authenticate');
		
		view()->share([
			'tree'=>category_tree(),
			'status'=>Status::STATUS,
		]);
		
		$this->model = $Document;
		$this->view = 'document::manage.document.';
	}
	
	public function getIndex(Paginate $Paginate) 
	{
		$page = $Paginate->setUrlParams($this->data)->page($this->model->orderBy('created_at','desc'));
		return $this->response("index",$page);
	}
	
	public function getCreate()
	{
		return $this->response('create');
	}
	
	public function postStore(DocumentData $DocumentData,CategoryDocument $CategoryDocument) 
	{
		
		$this->validate(['title','status','category_id','thumbnail'],$this->model,array_merge($this->data['document'],['category_id'=>$this->data['category_id']]));
		$this->validate(['content','seo_title','seo_keywords','seo_description'],$this->model,$this->data['document_data']);
		
		$this->model = $this->storeData(['title','status','thumbnail'],$this->model,$this->data['document']);
		$this->storeData(['did','content','seo_title','seo_keywords','seo_description'],$DocumentData,array_merge($this->data['document_data'],['did'=>$this->model->id]));
		
		//类别
		$CategoryDocument->storeData($this->data['category_id'],$this->model->id);
		
		//tags
		if (!empty($this->data['tags']))
		{
			event(new TagOutside($this->data['tags'],$this->model->id,'Simon\Document\Models\Document'));
		}
		
		//images
		if (!empty($this->data['images']))
		{
			event(new ImageOutside($this->data['images'],$this->model->id,'Simon\Document\Models\Document'));
		}
		
		
		return $this->response(['success'],'manage/document/index');
	}
	
	public function getEdit($id)
	{
		$this->model = $this->model->findOrFail($id);
		
		$this->model->categorys = $this->model->belongsToManyCategory()->lists('id')->toArray();
		
		//
		$images = $this->model->morphManyImages;
		
		return $this->response("edit",['model'=>$this->model,'images'=>$images]);
	}
	
	public function putUpdate($id,DocumentData $DocumentData,CategoryDocument $CategoryDocument) 
	{
		$this->validate(['title','status','category_id','thumbnail'],$this->model,array_merge($this->data['document'],['category_id'=>$this->data['category_id']]));
		$this->validate(['content','seo_title','seo_keywords','seo_description'],$this->model,$this->data['document_data']);
		
		$this->updateData($id,['title','status','thumbnail'],$this->model,$this->data['document']);
		$this->updateData($id,['content','seo_title','seo_keywords','seo_description'],$DocumentData,$this->data['document_data']);
		
		//主体编辑
// 		$this->model->updateData($id,$this->data['document']);
// 		$DocumentData->updateData($id,array_merge($this->data['document_data']));
		
		//category-现在，全删除，全添加
		$CategoryDocument->where('document_id',$id)->delete();
		$CategoryDocument->storeData($this->data['category_id'],$id);
		
		//tags
		\Simon\Tag\Models\TagOutside::where('outside_id',$id)->where('outside_type','Simon\Document\Models\Document')->delete();
		if (!empty($this->data['tags']))
		{
			event(new TagOutside($this->data['tags'],$id,'Simon\Document\Models\Document'));
		}
		
		//images
		if (!empty($this->data['images']))
		{
			event(new ImageOutside($this->data['images'],$id,'Simon\Document\Models\Document'));
		}
		
		return $this->response(['success'],'manage/document/index');
	}
}