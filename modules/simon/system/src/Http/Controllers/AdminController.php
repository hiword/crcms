<?php
namespace Simon\System\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\System\Models\Admin;
use Simon\System\Fields\Admin\Status;
use App\Services\Paginate;
class AdminController extends Controller
{
    
    public function __construct(Admin $Admin)
    {
        parent::__construct();
        
        $this->middleware('Simon\System\Http\Middleware\Authenticate');
        
        $this->model = $Admin;
        
        $this->view = 'system::admin.';
        
        view()->share([
            'status'=>Status::STATUS,
        ]);
    }
    
    public function getIndex(Paginate $Paginate)
    {
        $page = $Paginate->setUrlParams($this->data)->page($this->model->orderBy('created_at','desc'));
        return $this->response('index',$page);
    }
    
    public function getCreate()
    {
        return $this->response('create');
    }
    
    public function postStore()
    {
        $fields = ['name','password','status'];
        
        $this->validate($fields);
        
        $this->storeData($fields);
        
        return $this->response(['success'],'manage/admin');
    }
    
    public function getEdit($id)
    {
        $this->model = $this->model->findOrFail($id);
        return $this->response('edit',['model'=>$this->model]);
    }
    
    public function putUpdate($id)
    {
        $fields = ['name','status'];
        
        if (!empty($this->request->input('password')))
        {
            $fields = ['password'];
        }
        
        $this->validate($fields);
        
        $this->updateData($id,$fields);
        
        return $this->response(['success'],'manage/admin');
    }
    
    public function deleteDestroy()
    {
        $this->destroyData($this->data['id']);
        
        return $this->response(['success']);
    }
}