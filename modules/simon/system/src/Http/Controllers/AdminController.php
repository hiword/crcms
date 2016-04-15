<?php
namespace Simon\System\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\Paginate;
use Simon\System\Services\Admin\Interfaces\AdminInterface;
use Simon\System\Forms\Admin\AdminStoreForm;
use Simon\System\Services\Admin\Interfaces\AdminStoreInterface;
use Simon\System\Forms\Admin\AdminUpdateForm;
use Simon\System\Services\Admin\Interfaces\AdminUpdateInterface;
class AdminController extends Controller
{
    protected $view = 'system::admin.';
    
    public function __construct(AdminInterface $Admin)
    {
        parent::__construct();
        
//         $this->middleware('Simon\System\Http\Middleware\Authenticate');
        
        $this->service = $Admin;
        
        view()->share([
            'status'=>$this->service->status(),
        ]);
    }
    
    public function getIndex()
    {
        $page = $this->service->paginate($this->data);
        return $this->view('index',$page);
    }
    
    public function getCreate()
    {
        return $this->view('create');
    }
    
    public function postStore(AdminStoreForm $AdminStoreForm,AdminStoreInterface $AdminStoreInterface)
    {
    	
    	$this->form->validator($AdminStoreForm);
    	
    	$AdminStoreInterface->store($this->data,$this->request);
    	
    	//logs
    	$this->logs(['remark'=>'add administrator']);
    	
    	return $this->response(['app.success'],'manage/admin');
    	
        $fields = ['name','password','status'];
        
        $this->validate($fields);
        
        $this->storeData($fields);
        
        //logs
        $this->logs(['remark'=>'add administrator']);
        
        return $this->response(['success'],'manage/admin');
    }
    
    public function getEdit($id)
    {
        $model = $this->service->find($id);
        return $this->view('edit',['model'=>$model]);
    }
    
    public function putUpdate($id,AdminUpdateForm $AdminUpdateForm,AdminUpdateInterface $AdminUpdateInterface)
    {
    	
    	$this->form->validator($AdminUpdateForm);
    	
    	$AdminUpdateInterface->update($id, $this->data);
    	
    	//logs
    	$this->logs(['remark'=>'update administrator']);
    	
    	return $this->response(['app.success'],'manage/admin');
    	
        $fields = ['name','status'];
        
        if (!empty($this->request->input('password')))
        {
            $fields = ['password'];
        }
        
        $this->validate($fields);
        
        $this->updateData($id,$fields);
        
        //logs
        $this->logs(['remark'=>'update administrator']);
        
        return $this->response(['success'],'manage/admin');
    }
    
    public function deleteDestroy()
    {
        $this->destroyData($this->data['id']);
        
        //logs
        $this->logs(['remark'=>'destroy administrator']);
        
        return $this->response(['success']);
    }
}