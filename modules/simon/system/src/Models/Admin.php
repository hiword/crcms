<?php
namespace Simon\System\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Admin extends Model
{

    use SoftDeletes;
    
    protected static $fields = [
        'name'=>'Simon\System\Fields\Admin\Name',
        'password'=>'Simon\System\Fields\Admin\Password',
        'status'=>'Simon\System\Fields\Admin\Status',
    ];

    
}