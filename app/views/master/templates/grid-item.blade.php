<div class="item {{($client->secondary_img!='')?'hover-img':''}}" data-toggle="modal" data-target="#{{$client->slug}}Modal">
	<div class="client-img">
		<img src="{{url('/').$client->featured_img}}" alt="{{$client->name}}" class="img-responsive main-img" />
		@if($client->secondary_img!='')
		<img src="{{url('/').$client->secondary_img}}" alt="{{$client->name}}" class="img-responsive hover-img" />
		@endif
	</div>
	<div class="info">
		<p class="client-name">{{$client->name}}</p>
		@if($client->city)
		<p class="client-location">{{$client->city}}, {{$client->state}}</p>
		@endif
	</div>
</div>