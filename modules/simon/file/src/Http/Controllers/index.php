<?php if (!defined('CRCMS')) exit();?>
<?php if (!defined('CRCMS')) exit();?>
<?php //添加主模板?>
<!doctype html>
<html>
<head>
<include file="./Public/tpl/theme/default/global_meta.php" />
<title><?php echo WEB_NAME?> - <?php echo CRCMS_VERSION;?></title>
<include file="./Public/tpl/common/global_load.php" />
<include file="./Public/tpl/theme/default/global_header.php" />
<tagLib name="CRHtml" />
</head>
<body class="c-main">
<button id="s">上传附件</button>
<div id="ssd">ssdssd</div>

<include file="./Public/tpl/theme/default/global_footer.php" />
<script>
window.dialog = dialog;
$(function(){
	$('#s').on('click',function(){
		$.post('<?php echo U('upload')?>',{},function(data){
			dialog({
				title:'附件上传'
				,width:600
				,height:470
				,okValue:'确定'
				,ok:function(){
					//alert($);
					$('#g').remove();
					$('#ssd').css('background','red');
					return false;
				}
				,cancelValue:'关闭'
				,cancel:function(){
					this.close()
				}
			}).content(data).show();
		});
	});
});
</script>