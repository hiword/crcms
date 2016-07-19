<?php

namespace Simon\Model\Fields;

interface FieldInterface
{
	
	public function setting();
	
	public function htmlForm($value = null);
	
	public function arrayForm($value = null);
	
	public function validateRule($id = 0);
	
	public function filter($value);
	
	public function show($value,$primaryKey = 'id');
	
}
