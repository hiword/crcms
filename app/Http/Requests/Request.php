<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 13:51
 */

namespace App\Http\Requests;


use App\Exceptions\ValidateException;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{

    /**
     * 验证异常重写
     * @param Validator $validator
     * @throws ValidateException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidateException($validator);
    }

}