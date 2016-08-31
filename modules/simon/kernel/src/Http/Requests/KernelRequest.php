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
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

abstract class KernelRequest extends FormRequest
{

    public function authorize()
    {
        //
        //增加访问次数记录
        if ($this->method() !== 'GET') app(Visited::class)->put();



        return true;
    }

//    protected function getValidatorInstance()
//    {
//        if ($this->method() === 'GET')
//        {
//            return NULL;
//        }
//
//        $factory = $this->container->make(ValidationFactory::class);
//
//
//
//        if (method_exists($this, 'validator')) {
//            return $this->container->call([$this, 'validator'], compact('factory'));
//        }
//
//        return $factory->make(
//            $this->validationData(), $this->container->call([$this, 'rules']), $this->messages(), $this->attributes()
//        );
//    }

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