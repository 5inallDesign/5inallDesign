<nav class="navbar navbar-default navbar-fixed-top spy-active" role="navigation" id="topNav">
	<div class="container-fluid">
  	<!-- Brand and toggle get grouped for better mobile display -->
  	<div class="navbar-header">
    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topNav-collapse">
      	<span class="sr-only">Toggle navigation</span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand scroll" href="{{url('/')}}{{(isset($active_page)) && ($active_page != 'home')?'':'#home'}}" data-target="#home">
          <img src="{{url('/')}}/img/5inalldesign.png" alt="5inallDesign" class="img-responsive">
          <div class="hidden-xs by-matt">By Matt Crandell</div>
          </a>
  	</div>

  	<!-- Collect the nav links, forms, and other content for toggling -->
  	<div class="collapse navbar-collapse" id="topNav-collapse">
    		<ul class="nav navbar-nav navbar-right">
		   		<li class="{{(!isset($active_page)) || ($active_page == 'home')?'active':''}}"><a href="{{url('/')}}{{(isset($active_page)) && ($active_page != 'home')?'':'#home'}}" data-target="#home" class="scroll">Home</a></li>
				  <li class="{{(isset($active_page)) && ($active_page == 'portfolio')?'active':''}}"><a href="{{url('/')}}#portfolio" data-target="#portfolio" class="scroll">Portfolio</a></li>
  				<li><a href="{{url('/')}}#services" data-target="#services" class="scroll">Services</a></li>
          <li><a href="{{url('/')}}#about" data-target="#about" class="scroll">About</a></li>
  				<li><a href="{{url('/')}}#contact" data-target="#contact" class="scroll">Contact</a></li>
    		</ul>
  	</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="content">