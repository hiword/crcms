<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/27
 * Time: 18:14
 */

namespace Simon\Kernel\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Simon\Kernel\Exceptions\ValidateException;
use Simon\Kernel\Services\Visited;

abstract class KernelRequest extends FormRequest
{

    public function authorize()
    {
        //
        //增加访问次数记录
        app(Visited::class)->put();


        return true;
    }

    protected function failedValidation(Validator $Validator)
    {
        throw new ValidateException($Validator);
    }

    public function rules()
    {
        if($this->method() === 'GET')
        {
            return [];
        }

        if (method_exists($this,'put_rules'))
        {
            return $this->put_rules();

        }
    }



}