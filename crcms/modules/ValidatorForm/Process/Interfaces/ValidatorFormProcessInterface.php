<?php
namespace CrCms\ValidatorForm\Process\Interfaces;
use CrCms\ProcessInterface;

interface ValidatorFormProcessInterface extends ProcessInterface
{
	/**
	 * 表单验证
	 * @param array $data
	 * @return bool
	 * @author simon
	 */
	public function validateForm(array $data) : bool;
	
	/**
	 * 获取表单验证后的返回信息
	 * @return string
	 * @author simon
	 */
	public function getValidateMessage() : string;
}