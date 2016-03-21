<?php
namespace App\Fields\Interfaces;

interface FieldInterface
{
	/**
	 * Method Name
	 * @var string
	 * @author simon
	 */
	const STORE_HANDLE = 'storeHandle';
	
	/**
	 * Method Name
	 * @var string
	 * @author simon
	 */
	const UPDATE_HANDLE = 'updateHandle';
	
	/**
	 * Method Name
	 * @var string
	 * @author simon
	 */
	const DESTROY_HANDLE = 'destroyHandle';
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	const DISPLAY_HANDLE = 'displayHandle';
	
	/**
	 * Method Name
	 * @var string
	 * @author simon
	 */
	const VALIDATE_RULE = 'validateRule';
	
	
	/**
	 * 数据验证规则
	 * @author simon
	 */
	public function validateRule();
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function displayHandle();
	
	/**
	 * 表单属性
	 * @author simon
	*/
	public function formAttributes();
	
	/**
	 * 字段处理
	 * @author simon
	*/
	public function handle();
	
	/**
	 * 存储处理
	 * @author simon
	*/
	public function storeHandle();
	
	/**
	 * 编辑处理
	 * @author simon
	*/
	public function updateHandle();
	
	/**
	 * 删除处理
	 * @author simon
	*/
	public function destroyHandle();
}