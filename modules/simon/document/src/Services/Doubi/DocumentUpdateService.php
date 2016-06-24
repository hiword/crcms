<?php
namespace Simon\Document\Services\Document;
use Simon\Document\Services\Document;
use Simon\Document\Services\Document\Interfaces\DocumentUpdateInterface;
use App\Services\Traits\UpdateTrait;
use Simon\Document\Models\DocumentData;
use Simon\Document\Models\Document as DocumentModel;
use Illuminate\Support\Facades\Input;
class DocumentUpdateService extends Document implements DocumentUpdateInterface
{
	use UpdateTrait;
	
	public function __construct(DocumentModel $Document,DocumentData $DocumentData)
	{
		parent::__construct($Document);
		$this->append = $DocumentData;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($id, array $data,array $append)
	{
		// TODO Auto-generated method stub
		
		
		$this->data['title'] = $data['title'];
		$this->data['thumbnail'] = $data['thumbnail'];
		$this->data['status'] = $data['status'];
		$this->builtDataUpdate();
		$this->model->where('id',$id)->update($this->data);
		
		//
		$this->append->where('did',$id)->update([
			'content'=>format_xss(Input::get('document_data.content')),
			'keyword'=>$append['seo_keywords'],
			'intro'=>$append['seo_description'],
		]);
	}

	
	
	
}