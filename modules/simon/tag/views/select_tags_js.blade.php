<script src="{{static_asset('static/bootstrap/js/bootstrap3-typeahead.min.js')}}"></script>
<script>
$(function(){
	$.TAGS.search('#search-tags','{{url("tags/search")}}','{{url("tags/create")}}');
	$.TAGS.destroy();
});
</script>