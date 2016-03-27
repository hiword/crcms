<?php
namespace Simon\Document\Models;
use App\Models\Model;
class DocumentData extends Model
{
	
	public $timestamps = false;
	
	protected $primaryKey = 'did';
	
	protected static $fields = [
			'did'=>'Simon\Document\Fields\DocumentData\Did',
			'content'=>'Simon\Document\Fields\DocumentData\Content',
			'seo_title'=>'Simon\Document\Fields\DocumentData\SeoTitle',
			'seo_keywords'=>'Simon\Document\Fields\DocumentData\SeoKeywords',
			'seo_description'=>'Simon\Document\Fields\DocumentData\SeoDescription',
	];
	
	protected function dataStoreHandle()
	{
		
	}
	
	protected function dataUpdateHandle()
	{
		
	}
	
	
	protected function dataDestroyHandle()
	{
		
	}
	
	public function interceptContent() 
	{
		$stripTagsContent = strip_tags($this->attributes['content']);
		if (strpos($stripTagsContent, '_ueditor_page_break_tag_')) 
		{
			return explode('_ueditor_page_break_tag_', $this->attributes['content'])[0];
		}
		else
		{
			return mb_substr($stripTagsContent, 0,255,'UTF-8');
		}
	}
}