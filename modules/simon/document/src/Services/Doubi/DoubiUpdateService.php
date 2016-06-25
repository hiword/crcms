<?php
namespace Simon\Document\Services\Doubi;
use Simon\Document\Services\Doubi;
use Simon\Document\Services\Doubi\Interfaces\DoubiUpdateInterface;
use App\Services\Traits\UpdateTrait;
use Simon\Document\Models\Doubi as DoubiModel;
use Illuminate\Support\Facades\Input;
use Simon\Document\Models\DoubiData;
class DoubiUpdateService extends Doubi implements DoubiUpdateInterface
{
	use UpdateTrait;
	
	public function __construct(DoubiModel $Doubi,DoubiData $DoubiData)
	{
		parent::__construct($Doubi);
		$this->append = $DoubiData;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($id, array $data,array $append)
	{
		// TODO Auto-generated method stub
		
		
		$this->data['seo_title'] = $data['seo_title'];
		$this->data['picture'] = $data['picture'];
		$this->data['status'] = $data['status'];
		$this->data['sort'] = $data['sort'];
		$this->builtDataUpdate();
		$this->model->where('id',$id)->update($this->data);
		
		//
		$this->append->where('did',$id)->update([
			'content'=>$append['content'],
			'seo_keyword'=>$append['seo_keyword'],
			'seo_intro'=>$append['seo_intro'],
		]);
	}

	
	
	
}