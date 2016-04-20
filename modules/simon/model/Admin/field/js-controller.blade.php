<script>
function formUrl()
{
	return '<?php echo url('manage/form/field')?>';
}

function resultSuccessCallback(){
	//window.location.href = "{{url('manage/model')}}";
	window.location.reload();
}

function destroyUrl()
{
	return "{{url('manage/field')}}";
}



$(function(){

	$('.nav-tabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

	$('.tab-content .text-right button').hide();
});

@if(Request::segment(4)==='edit')

function editUrl(id)
{
	return "{{url('manage/field/')}}"+'/'+id+'/edit?model_id={{$data->model_id}}';
}

function showUrl()
{
	return '{{url("manage/field/".$data->id)}}?model_id={{$data->model_id}}';
}


function formShow(data)
{
}
@endif
</script>