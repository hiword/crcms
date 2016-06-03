<script src="{{static_asset('vendor/bootstrap/js/bootstrap3-typeahead.min.js')}}"></script>
<script>
$(function(){
	$.TAGS.search('#search-tags','{{url("tags/like")}}','{{url("tags/create")}}');
	$.TAGS.destroy();
});
</script>