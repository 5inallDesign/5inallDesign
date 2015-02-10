@extends('master.templates.master', array('var1'=>'', 'var2'=>''))
@section('body')

<div id="error" class="error-container">
	<div class="page">
		<h1>404 Error: File Not Found</h1>
		<p>The page you are looking for ({{Request::url()}}) isn't here. We apologize for this inconvenience.</p>
		<p>If you think you are receiving this page in error, please email <a href="mailto:matt@5inalldesign.com">matt@5inalldesign.com</a> about the issue.</p>
	</div>
</div>

@stop