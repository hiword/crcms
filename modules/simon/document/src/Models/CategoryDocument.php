<?php
namespace Simon\Document\Models;
use App\Models\Model;
class CategoryDocument extends Model {
	
	public $timestamps = false;
	
// 	protected $primaryKey = null;
	
	protected $table = 'category_documents';
	
	protected $fillable = ['document_id','category_id','type'];
	
	/**
	 * 数据存储
	 * @param array $data
	 * @return boolean
	 * @author simon
	 */
	public function storeData(array $data = [],$documentId = 0) 
	{
		foreach ($data as $value)
		{
			parent::storeData(['category_id'=>$value,'document_id'=>$documentId]);
		}
		return true;
	}
}