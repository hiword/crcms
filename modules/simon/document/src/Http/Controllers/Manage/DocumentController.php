<?php
namespace Simon\Document\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Document\Services\Document\Interfaces\DocumentInterface;
use Simon\Document\Forms\Document\DocumentStoreForm;
use Simon\Document\Services\Document\Interfaces\DocumentStoreInterface;
use Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentStoreInterface;
use Simon\Document\Services\Category\Interfaces\CategoryInterface;
use Simon\Document\Forms\CategoryDocument\CategoryDocumentStoreForm;
use Simon\Document\Forms\Document\DocumentUpdateForm;
use Simon\Document\Forms\CategoryDocument\CategoryDocumentUpdateForm;
use Simon\Document\Services\Document\Interfaces\DocumentUpdateInterface;
use Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentUpdateInterface;
// use Simon\Document\Fields\Document\Status;
// use Simon\Document\Models\Category;
// use Simon\Document\Models\Document;
// use Simon\Document\Models\DocumentData;
// use App\Services\Paginate;
// use Simon\Document\Models\CategoryDocument;
class DocumentController extends Controller
{
	protected $view = 'document::manage.document.';
	
// 	protected $appendService = null;
	
	public function __construct(DocumentInterface $Document,CategoryInterface $Category)
	{
		
		parent::__construct();
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		view()->share([
			'tree'=>$Category->tree(),
			'status'=>$Category->status(),
		]);
		
		$this->service = $Document;
// 		$this->appendService = $DocumentData;
	}
	
	public function getIndex() 
	{
// 		return '<img src="'.route('img_src',['filename'=>base64_encode('f/3/o_1afl6v4dcidi1mm01o441cr01vag7.jpg')]).'" alt="" />';;
		$page = $this->service->paginate();
		return $this->view('index',$page);
// 		Paginate $Paginate
// 		$page = $Paginate->setUrlParams($this->data)->page($this->model->orderBy('created_at','desc'));
// 		return $this->response("index",$page);
	}
	
	public function getCreate()
	{
		if (module_exists('file'))
		{
// 			upload_config('image_upload');
			$uploading = true;
		}
		else
		{
			$uploading = false;
		}
		return $this->view('create',['uploading'=>$uploading]);
	}
	
	public function postStore(DocumentStoreForm $DocumentStoreForm,CategoryDocumentStoreForm $CategoryDocumentStoreForm,DocumentStoreInterface $DocumentStoreInterface,CategoryDocumentStoreInterface $CategoryDocumentStoreInterface) 
	{
		//validator
		$this->form->validator($DocumentStoreForm);
		
		$this->form->validator($CategoryDocumentStoreForm);
		
		//store
		$model = $DocumentStoreInterface->store($this->data['document'],$this->data['document_data']);
		
		//category
		$CategoryDocumentStoreInterface->store($model->id, $this->data['category_id']);
		
// 		$this->model = $this->storeData(['title','status','thumbnail'],$this->model,$this->data['document']);
// 		$this->storeData(['did','content','seo_title','seo_keywords','seo_description'],$DocumentData,array_merge($this->data['document_data'],['did'=>$this->model->id]));
		
// 		//类别
// 		$CategoryDocument->storeData($this->data['category_id'],$this->model->id);
		
// 		//tags
		if (module_exists('tag') && !empty($this->data['tags']))
		{
			event(new \Simon\Tag\Events\TagOutside($this->data['tags'],$model->id,'Simon\Document\Models\Document'));
		}
		
// 		//images
		if (module_exists('file') && !empty($this->data['images']))
		{
			event(new \Simon\File\Events\ImageOutside($this->data['images'],$model->id,'Simon\Document\Models\Document'));
		}
		
		//logs
		$this->logs(['remark'=>'add document']);
		
		return $this->response(['app.success'],'manage/document/index');
	}
	
	public function getEdit($id,$hash)
	{
		if (module_exists('file'))
		{
			upload_config('image_upload');
			$uploading = true;
		}
		else
		{
			$uploading = false;
		}
		
// 		$this->validateHash($id,$hash);
		
		$model = $this->service->find($id);
		
// 		$this->hash($id);
		
		//categories
		$categories = $this->service->categoryIds($model);
		
		//images
		$images = $this->service->images($model);
		
		//tags
		$tags = $this->service->tags($model);
		
		return $this->view("edit",['uploading'=>$uploading,'model'=>$model,'categories'=>$categories,'images'=>$images,'tags'=>$tags]);
	}
	
	public function putUpdate($id,DocumentUpdateForm $DocumentUpdateForm,CategoryDocumentUpdateForm $CategoryDocumentUpdateForm,CategoryDocumentUpdateInterface $CategoryDocumentUpdateInterface,DocumentUpdateInterface $DocumentUpdateInterface) 
	{
		
		//validator
		$this->form->validator($DocumentUpdateForm);
		
		$this->form->validator($CategoryDocumentUpdateForm);
		
		
		$DocumentUpdateInterface->update($id, $this->data['document'], $this->data['document_data']);
		
// 		$this->validateHash($id);
		
// 		$this->validate(['title','status','category_id','thumbnail'],$this->model,array_merge($this->data['document'],['category_id'=>$this->data['category_id']]));
// 		$this->validate(['content','seo_title','seo_keywords','seo_description'],$this->model,$this->data['document_data']);
		
// 		$this->updateData($id,['title','status','thumbnail'],$this->model,$this->data['document']);
// 		$this->updateData($id,['content','seo_title','seo_keywords','seo_description'],$DocumentData,$this->data['document_data']);
		
		//主体编辑
// 		$this->model->updateData($id,$this->data['document']);
// 		$DocumentData->updateData($id,array_merge($this->data['document_data']));
		
		//category-现在，全删除，全添加
		$CategoryDocumentUpdateInterface->update($id, $this->data['category_id']);
// 		$CategoryDocument->where('document_id',$id)->delete();
// 		$CategoryDocument->storeData($this->data['category_id'],$id);
		
		//tags
		if (module_exists('tag'))
		{
			//\Simon\Tag\Models\TagOutside::where('outside_id',$id)->where('outside_type','Simon\Document\Models\Document')->delete();
			$tags = empty($this->data['tags']) ? [] : $this->data['tags'];
// 			if (!empty($this->data['tags']))
// 			{
				event(new \Simon\Tag\Events\TagOutside($tags,$id,'Simon\Document\Models\Document'));
// 			}	
		}
		
		//images
		if (module_exists('file') && !empty($this->data['images']))
		{
			event(new \Simon\File\Events\ImageOutside($this->data['images'],$id,'Simon\Document\Models\Document'));
		}
		
		//logs
		$this->logs(['remark'=>'update document']);
		
		return $this->response(['success'],'manage/document/index');
	}
	
	public function deleteDestroy()
	{
		$ids = [];
		foreach ($this->data['hash'] as $key=>$hash)
		{
			if (check_hash($this->data['id'][$key], $hash))
			{
				$ids[] = $this->data['id'][$key];
			}
		}
		
		$this->destroyData($ids);
		 
		$this->logs(['remark'=>'destroy document']);
		 
		return $this->response(['success']);
	}
}