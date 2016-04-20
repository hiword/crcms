<?php
namespace Admin\Fields;
use App\Fields\Field;
class Model extends Field {
	/* (non-PHPdoc)
	 * @see \Fields\Fields::fieldAttributes()
	 */
	
	protected function uniqueValidator($rule,$field) {
		$route = app('Illuminate\Routing\Router');
		$request = app('request');
		if ($route->currentRouteName() === 'manage.model.store') {
			$rule .=  "|unique:models";
		} else {
			$rule .= "|unique:models,{$field},".intval($request->input('id'));
		}
		return $rule;
	}
	
	public function fieldAttributes() {
		// TODO Auto-generated method stub
		
		return [
		    'id'=>$this->idAttribute(),
			'name'=>[
				'validator_php'=>'required|min:1|max:30',
				'form'=>[
					'attr'=>[
						'type'=>'text',
						'datatype'=>'*',
						'placeholder'=>'',
					],
					'label_name'=>'模型名称',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'mark'=>[
				'validator_php'=>function () {
					$rule = 'required|min:1|max:30';
					return $this->uniqueValidator($rule, 'mark');
				},
				'form'=>[
					'attr'=>[
						'type'=>'text',
					],
					'label_name'=>'email',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'table_name'=>[
				'validator_php'=>function () {
					$rule = 'min:1|max:30';
					return $this->uniqueValidator($rule, 'table_name');
				},
				'form'=>[
					'attr'=>[
						'type'=>'text',
						'datatype'=>'*',
						'placeholder'=>'',
					],
					'label_name'=>'数据表名',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'model_path'=>[
				'validator_php'=>'min:1|max:100',
				'form'=>[
					'attr'=>[
						'type'=>'text',
						'datatype'=>'*',
						'placeholder'=>'',
					],
					'label_name'=>'模型路径',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'field_path'=>[
				'validator_php'=>'min:1|max:100',
				'form'=>[
					'attr'=>[
						'type'=>'text',
						'datatype'=>'*',
						'placeholder'=>'',
					],
					'label_name'=>'字段路径',
					'label_explain'=>'',
					'role'=>'text',
				],
			],
			
			'type'=>[
				'validator_php'=>'integer',
				'form'=>[
					'attr'=>[
						'type'=>'select',
						'value'=>1,
					],
					'label_name'=>'模型类型',
					'label_explain'=>'',
					'role'=>'select',
					'option'=>[1=>'独立模型',2=>'文档模型',3=>'会员模型'],
				],
			],
			
			'engine'=>[
				'validator_php'=>'required',
				'form'=>[
					'attr'=>[
						'type'=>'select',
						'value'=>1,
					],
					'label_name'=>'模型引擎',
					'label_explain'=>'',
					'role'=>'select',
					'option'=>['InnoDB'=>'InnoDB','MyISAM'=>'MyISAM','MEMORY'=>'MEMORY'],
				],
			],
			
			'extend_id'=>[
					'validate_php'=>'max:100',
					'form'=>[
							'attr'=>[
							'type'=>'text',
						],
						'label_name'=>'模型继承',
						'label_explain'=>'模型id，如：1,2,3。优先级递增',
						'role'=>'text',
					],
			],
			
			'status'=>$this->statusAttribute(),
			/* [
				'validator_php'=>'integer',
				'form'=>[
					'attr'=>[
						'type'=>'radio',
						'value'=>1,
					],
					'label_name'=>'状态',
					'label_explain'=>'',
					'role'=>'radio',
					'option'=>[1=>'开启',2=>'禁用'],
				],
			], */
			
			'remark'=>[
			    'validator_php'=>'min:1|max:255',
			    'form'=>[
		          'attr'=>[
	            'type'=>'textarea',
					'datatype'=>'*',
	            'ignore'=>'ignore',
	            'placeholder'=>'',
					'class'=>'remark form-control',
		        ],
            'label_name'=>'备注说明',
            'label_explain'=>'',
					'role'=>'textarea',
				],
			],
// 			'is_created'=>[
// 				'validator_php'=>'integer',
// 				'form'=>[
// 					'attr'=>[
// 					'type'=>'radio',
// 					'option'=>[1=>'开启',2=>'禁用'],
// 					'value'=>1,
// 				],
// 				'label_name'=>'状态',
// 				'label_explain'=>'',
// 				'role'=>'radio',
// 				],
// 			],
		];
		
	}

	protected function getModels() 
	{
		$request = app('request');
		dd($request->route()->two);
		$model = new \Admin\Models\Model();
		return $model->lists('name','id');
	}
	
}