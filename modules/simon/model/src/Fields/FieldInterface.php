<?php

namespace Simon\Model\Fields;

interface FieldInterface
{
	
	
	public function setting();
	
	public function htmlForm($value = null);
	
	public function arrayForm($value = null);
	
}
