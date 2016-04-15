<?php
namespace Simon\System\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Admin extends Model
{

    use SoftDeletes;
    
    /**
     * 状态
     * @var numeric
     * @author simon
     */
    const STATUS_VERIFIED = 1;
    
    /**
     * 状态 禁止
     * @var numeric
     * @author simon
     */
    const STATUS_BAN = 2;
    
    /**
     * 会员状态数组
     * @var numeric
     * @author simon
     */
    const STATUS = [self::STATUS_VERIFIED=>'正常',self::STATUS_BAN=>'禁止'];
    
    protected static $fields = [
        'name'=>'Simon\System\Fields\Admin\Name',
        'password'=>'Simon\System\Fields\Admin\Password',
        'status'=>'Simon\System\Fields\Admin\Status',
    ];

    
}