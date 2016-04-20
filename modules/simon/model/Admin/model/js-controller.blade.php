<script>
function formUrl()
{
	<?php
	/*
// 	@if(is_numeric(Request::segment(3)))
// 	    return '<?php echo url('manage/form/model',['id'=>Request::segment(3)])?>';
// 	@else
// 	    return '<?php echo url('manage/form/model')?>';
// 	@endif*/
	?>
	return '<?php echo url('manage/form/model')?>';
}

function resultSuccessCallback(){
	window.location.href = "{{url('manage/model')}}";
}

function destroyUrl()
{
	return "{{url('manage/model')}}";
}

function editUrl(id)
{
	return "{{url('manage/model/')}}"+'/'+id+'/edit';
}

$(function(){
	$('#field').on('click',function(){
		var id = $('[name="id[]"]:checked').val();
		if(!id)
		{
			return false;
		}
		window.location.href = '{{url("manage/field")}}?model_id='+id;
	});

	$('#generation').on('click',function(){
		$.get('{{url("manage/model/generation")}}',{id:$('[name="id[]"]:checked').val()},function(data){
		});
	});

});

@if(Request::segment(4)==='edit')



function showUrl()
{
	return '{{url("manage/model/".$data->id)}}';
}


function formShow(data)
{
	$('[name="table_name"],[name="engine"]').attr('readonly','readonly');
}

$(function(){
	$('input[name="table_name"]').attr('readonly','readonly');
});

@endif
</script>