<?php
namespace Admin\Fields;
use App\Fields\Field;
use \Admin\Models\Admin as AdminModel;
class Admin extends Field {
	/* (non-PHPdoc)
	 * @see \Fields\Fields::fieldAttributes()
	 */
	
	protected function uniqueValidator($rule,$field) {
		$router = app('router');
		$request = app('request');
		if ($router->currentRouteName() === 'manage.admin.store') {
			$rule .=  "|unique:admins";
		} elseif ($router->currentRouteName() === 'manage.admin.update') {
			$rule .= "|unique:admins,{$field},".intval($request->input('id'));
		} 
		elseif ($request->segments()[2] === 'login') {
			return $rule;
		}
		return $rule;
	}
	
	public function fieldAttributes() {
		// TODO Auto-generated method stwub
		
		return [
			'name'=>[
				'is_show'=>1,
				'is_fillable'=>1,
				'validator_php'=>function () {
					return $this->uniqueValidator('required|min:3|max:20','name');
				}
			],
			'email'=>[
				'validator_php'=>function () {
					return $this->uniqueValidator('required|email|max:40','email');
				},
// 				'form'=>[
// 					'attr'=>[
// 						'type'=>'radio',
// 					],
// 					'label_name'=>'类型',
// 					'label_explain'=>'',
// 					'role'=>'radio',
// 					'option'=>[1=>'1s',2=>'2s'],
// 				],
				'form'=>[
					'attr'=>[
						'type'=>'email',
						'datatype'=>'e',
						'placeholder'=>'email',
					],
					'label_name'=>'email',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'password'=>[
				'validator_php'=>'min:6|max:20',
				'form'=>[
					'attr'=>[
						'type'=>'password',
						'datatype'=>'*6-20',
						'placeholder'=>'password',
					],
					'label_name'=>'password',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'status'=>[
				'validator_php'=>'integer',
			],
		];
		
	}

	/**
	 * 存储密码加密
	 * @param string $value
	 * @return Ambigous <string, \Illuminate\Foundation\mixed, \Illuminate\Container\mixed, \Illuminate\Contracts\Container\mixed, multitype:, unknown>
	 */
	protected function passwordStoreValue($value) {
		return bcrypt($value);
	}
	
	/**
	 * 存储密码加密
	 * @param string $value
	 * @return Ambigous <string, \Illuminate\Foundation\mixed, \Illuminate\Container\mixed, \Illuminate\Contracts\Container\mixed, multitype:, unknown>
	 */
	protected function passwordUpdateValue($value) {
		
		if (empty($value)) {
			$request = app('request');
			$admin = AdminModel::find(intval($request->input('id')),['password']);
			return $admin->password;
		} else {
			return bcrypt($value);
		}
		
	}
}