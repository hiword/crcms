/**
 * 
 */
function resetForm(form)
{
	//reset
	form[0].reset();
	//添加[#1#]表情时，无法reset，所以单独重置
	form.find('[name="content"]').val('');
	//关闭表情
	form.find('.icons').hide();
	//关闭默认表情
	form.find('.face-action').attr('status','close');
}
$(function(){
	
	//icons
	$(document).on('click','.face-action',function(){
		var icons = $(this).parent().siblings('.icons');
		if($(this).attr('status') === 'close')
		{
			$(this).attr('status','open');
			icons.show();
		}
		else
		{
			$(this).attr('status','close');
			icons.hide();
		}
		return false;
	});

	//img添加
	$(document).on('click','.icons img',function(){
		var src = $(this).attr('show-id');
		//$(this).parent().siblings('.comment-box').append('<img src="'+src+'" alt="" />');
		$(this).parent().siblings('.comment-box').append(src);
	});

	//表单提交
	$(document).on('click','.comment-btn',function(){
		var form = $(this).closest('form');
		//var content = form.find('[name="content"]').html() || '';
		var values = form.serialize();
		
		$.ajax({
			url:form.attr('action'),
			type:'POST',
			data:values,
			success:function(response)
			{
				resetForm(form);
				//alert
				alert(response.app_message);
			},
			error:function(response)
			{
				alert(response.responseJSON.app_message);
			}
		});
		return false;
	});
	
	//回复操作
	$(document).on('click','.reply',function(){
		var reply_userid = $(this).attr('reply-userid');
		var reply_id = $(this).attr('reply-id');
		
		var comment = $('#comments .panel').clone();
		var form = comment.find('form');
		//重置form
		resetForm(form);
		
		form.append('<input type="hidden" name="reply_userid" value="'+reply_userid+'" />')
		form.append('<input type="hidden" name="reply_id" value="'+reply_id+'" />')
		//var comment = $('#comments .panel').clone();
		//comment.find('.comment-btn-reset').trigger('click');
		$(this).closest('.media-body').append(comment);
	});
});