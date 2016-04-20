<?php
namespace Admin\Fields;
use App\Fields\Field as BaseField;
class Field extends BaseField {
	
	public function fieldAttributes() {
		// TODO Auto-generated method stub
	
		return [
				'id'=>$this->idAttribute(),
		      'model_id'=>$this->idAttribute(),
				'name'=>[
						'validator_php'=>'required|min:1|max:30',
						'form'=>[
								'attr'=>[
									'type'=>'text',
									'datatype'=>'*1-30',
									'placeholder'=>'',
								],
								'label_name'=>'字段名称',
								'label_explain'=>'',
								'role'=>'text',
						],
				],
				'type'=>[
						'validator_php'=>'required|min:1|max:30',
						'form'=>[
								'attr'=>[
									'datatype'=>'*1-30',
									'placeholder'=>'',
								],
								'option'=>[
										'tinyInteger'=>'TINYINT',
										'smallInteger'=>'SMALLINT',
										'mediumInteger'=>'MEDIUMINT',
										'integer'=>'INTEGER',
										'bigInteger'=>'BIGINT',
										'decimal'=>'DECIMAL',
										'double'=>'DOUBLE',
										'float'=>'FLOAT',
										
										'char'=>'CHAR',
										'string'=>'VARCHAR|STRING',
										'text'=>'TEXT',
										'mediumText'=>'MEDIUMTEXT',
										'longText'=>'LONGTEXT',
										
										
										'date'=>'DATE',
										'dateTime'=>'DATETIME',
										'time'=>'TIME',
										'timestamp'=>'TIMESTAMP',
										
										'binary'=>'BLOB',
										'boolean'=>'BOOLEAN',
										'enum'=>'ENUM',
								],
								'label_name'=>'字段类型',
								'label_explain'=>'',
								'role'=>'select',
						],
				],
				'is_primary'=>[
           'validator_php'=>'integer',
              'form'=>[
                'attr'=>[
	                'type'=>'radio',
	                'value'=>0,
				      	],
                'label_name'=>'主键',
                'label_explain'=>'',
			          'role'=>'radio',
    					  'option'=>[0=>'否',1=>'是'],
        			],
        	],
				'length'=>[
						'validator_php'=>'regex:/^[\d]*$/',
						'form'=>[
								'attr'=>[
									'type'=>'number',
									'datatype'=>'/^[\d]*$/',
									'placeholder'=>'',
									'value'=>'',
								],
								'label_name'=>'字段长度',
								'label_explain'=>'',
								'role'=>'text',
						],
				],
				'field_option'=>[
						'validate_php'=>'array',
						'form'=>[
						'attr'=>[
								'type'=>'checkbox',
						],
							'option'=>[
								'unsigned'=>'UNSIGNED',
								'nullable'=>'允许为NULL',
						    'auto_increment'=>'AUTO INCREMENT',
						    'is_unique'=>'UNIQUE',
							],
						'label_name'=>'字段选项',
						'label_explain'=>'',
						'role'=>'checkbox',
				],
				],
				'default_value'=>[
						'validator_php'=>'min:1|max:100',
						'form'=>[
								'attr'=>[
									'name'=>'field_option[default_value]',
									'type'=>'text',
									'datatype'=>'*1-100',
									'placeholder'=>'',
									'ignore'=>'ignore',
								],
								'label_name'=>'字段默认值',
								'label_explain'=>'',
								'role'=>'text',
						],
				],
				'relation'=>[
						'validator_php'=>'max:50',
						'form'=>[
								'attr'=>[
									'type'=>'text',
									'datatype'=>'*1-50',
									'placeholder'=>'table:id',
									'ignore'=>'ignore',
								],
								'label_name'=>'字段关系',
								'label_explain'=>'',
								'role'=>'text',
						],
				],
				'status'=>$this->statusAttribute(),
				'sort'=>[
						'validator_php'=>'integer',
				],
				'setting'=>[
						'validator_php'=>'required|array',
				],
			];
	
		}
	
}