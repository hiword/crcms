<style>
.search-tags {border:0px;width:60px;height:23px;line-height:23px;padding-bottom:5px;}
.tag-item {margin-right:10px;display:inline;height:22px;line-height:22px;background:relative;padding:2px 5px 2px 10px;background:#5cb860;color:#FFFFFF}
.tag-item * {color:#FFFFFF;}
.tag-item a {text-decoration:none;}
.tag-item a:hover,.tag-item a:focus {text-decoration:none;color:#FFFFFF}
</style>
<div class="form-group">
<div class="form-control tag-items" style="height: auto;">
	<!-- 
	<span class="tag-item">
		<a href="###" class="delete-tag-item">A<i class="ml5 glyphicon glyphicon-remove fs12"></i></a>
	</span>
	 -->
	 @if(isset($tags))
		 @foreach($tags as $tag)
		<span class="tag-item">
			<a class="delete-tag-item" item-id="{{$tag->id}}" href="###">
				{{$tag->name}}
				<i class="ml5 glyphicon glyphicon-remove fs12"></i>
			</a>
		</span>
		<input type="hidden" value="{{$tag->id}}" name="tags[{{$tag->id}}]">
		@endforeach
	@endif
	<input type="text" id="search-tags" autocomplete="off" data-provide="typeahead" class="search-tags" placeholder="Tags">
</div><!-- 
    	<div class="hide tag-items-input">
    		<!-- 
    		<input type="hidden" name="tags[]" />
    		-->
    		<p class="help-block"></p>
    	</div>
    	
    	