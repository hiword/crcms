<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 19:17
 */

namespace Simon\User\Models;


use App\Models\Model;
use App\Models\Traits\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class User extends Model
{

    use SoftDeletes;

    public function scopeName(Builder $query,string $name,string $operator = '=')
    {
        return $query->where('name',$operator,$name);
    }

}