<title>{{isset($title) ? $title : ''}}</title>
<meta name="description" content="{{isset($description) ? $description : ''}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}" />

<!--<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('/')}}/css/flaticon.css" rel="stylesheet">
<link href="{{url('/')}}/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />-->
<?php $cache = 4; ?>
<link href="{{url('/')}}/css/style.css?version={{$cache}}" rel="stylesheet" type="text/css" media="all" />

<!---start-slider-->	
<!--<link rel="stylesheet" type="text/css" href="{{url('/')}}/css/slider.css" />-->
<!---//start-slider-->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lte IE 8]>
	<script src="{{url('/')}}/js/html5shiv.min.js"></script>
	<script src="{{url('/')}}/js/respond.min.js"></script>
	<style>
		.navbar.navbar-fixed-top .navbar-brand img {
			height: 30px;
			width: 155px;
			max-width: none;
		}
		.grid-item {
			width: 22% !important;
		}
		.services-container {
    		background: url(../img/services-container-bg.jpg) no-repeat center center fixed !important;
    	}
	</style>
<![endif]-->

<link rel="shortcut icon" href="{{url('/')}}/favicon.ico?v=2" type="image/x-icon">
<link rel="icon" href="{{url('/')}}/favicon.ico?v=2" type="image/x-icon">