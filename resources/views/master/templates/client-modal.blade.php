<div class="modal fade {{isset($fullPage)?'in':''}}" id="{{$client->slug}}Modal" tabindex="-1" role="dialog" aria-hidden="true" style="{{isset($fullPage)?'display:block':''}}">
 	<!--<div class="modal-dialog modal-lg">-->
    	<div class="modal-content">
      		<div class="modal-header">
                @if(isset($fullPage))
                <a href="{{url('/')}}/portfolio" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
                @else
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                @endif
                @if(isset($fullPage))
                    <h1 class="modal-title">
                @else
                    <h3 class="modal-title">
                @endif
                    {{$client->name}}
                @if(isset($fullPage))
                    </h1>
                @else
                    </h3>
                @endif
      		</div>
      		<div class="modal-body">
      			<div class="row">
      				<div class="col-sm-7 col-sm-push-5">
      					@if(count($client->Asset) == 1)
      					<p><img src="{{url('/').$client->featured_img}}" alt="{{$client->name}}" class="img-responsive center-block" /></p>
      					@else
      					<div id="{{$client->slug}}-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                            <div class="carousel-inner" role="listbox">
	      					<?php $i = 0; ?>
                            @foreach($client->Asset as $asset)
	      						<div class="item {{($i++ == 0)?'active':''}}">
                                    @if(isset($fullPage))
                                    <img src="{{url('/').$asset->path}}" alt="{{$asset->short_description}}" class="img-responsive center-block" />
                                    @else
                                    <img src="{{url('/').$asset->path}}" alt="{{$asset->short_description}}" class="img-responsive center-block" />
                                    @endif
                                </div>
	      					@endforeach
                            </div>
      					</div>
                        <div class="slide-buttons">
                            <a href="#{{$client->slug}}-carousel" class="btn btn-green slide-prev" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                            <a href="#{{$client->slug}}-carousel" class="btn btn-green slide-next" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                        </div>
      					@endif
      				</div>
      				<div class="col-sm-5 col-sm-pull-7">
      					@if(substr($client->description, 0, 3) != '<p>')
      					<p>
      					@endif
      					{!!$client->description!!}
      					@if(substr($client->description, -4) != '</p>')
      					</p>
      					@endif
		        		<p>Services provided:</p>
		        		<ul>
		        		@foreach($client->services as $service)
		        			<li>{{$service}}</li>
		        		@endforeach
		        		</ul>
		        		@if($client->is_use_url == 1)
		        		<p>See the full site at <a href="{{$client->url}}" rel="external" target="_blank">{{$client->url}}</a>.</p>
		        		@endif

		        		@if($client->Testimonial)
		        		@foreach($client->Testimonial as $testimonial)
		        		<p class="testimonial"><strong>&ldquo;</strong> {{$testimonial->testimonial}} <strong>&rdquo;</strong></p>
		        		<p class="testimonial-author text-right">&mdash; {{$testimonial->author}}</p>
		        		@endforeach
		        		@endif
      				</div>
      			</div>
        		
      		</div>
    	</div><!-- /.modal-content -->
  	<!--</div>--><!-- /.modal-dialog -->
</div><!-- /.modal -->