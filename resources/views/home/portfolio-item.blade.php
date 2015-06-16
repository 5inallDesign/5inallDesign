@extends('master.templates.master', array('active_page'=>'portfolio'))
@section('body')
	<div class="portfolio-item">
		@if($client->is_custom)
			@include('portfolio.'.$client->slug, array('client'=>$client,'fullPage'=>'true'))
		@else
			@include('master.templates.client-modal', array('client'=>$client,'fullPage'=>'true'))
		@endif
		<div class="modal-backdrop fade in"></div>
	</div>
@stop
@section('footercode')
	<script type="text/javascript">
		$('.modal').click(function(event)
		{
			if($(event.target).hasClass('modal'))
				window.location = "{{url('/')}}/portfolio";
		});
	</script>
@stop