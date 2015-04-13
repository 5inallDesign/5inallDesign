<div class="modal fade {{isset($fullPage)?'in':''}}" id="{{$client->slug}}Modal" tabindex="-1" role="dialog" aria-hidden="true" style="{{isset($fullPage)?'display:block':''}}">
 	<!--<div class="modal-dialog modal-lg">-->
    	<div class="modal-content">
      		<div class="modal-header">
                @if(isset($fullPage))
                <a href="{{url('/')}}/portfolio" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
                @else
        		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                @endif
        		<div class="h3 modal-title">{{$client->name}}</div>
      		</div>
      		<div class="modal-body">

                <div class="text-center margin-bottom-20"><img src="{{url('/')}}/img/samples/clarkston-chamber-of-commerce-banner1.jpg" alt="Logo for Clarkston Area Chamber of Commerce" class="img-responsive center-block" /></div>

                <div class="row margin-bottom-20">
                    <div class="col-sm-7 col-lg-8">
                        <p>For the Clarkston Area Chamber of Commerce, I not only created a new logo, but created a full brand package for them. I featured the clock from the old logo and a landmark in downtown, updated with cleaner lines and more modern look. A new typeface was chosen to be used across the board. Blue is used because it conveys reliability while the orange is inviting and energetic. After discovering a multicolored wall in the chamber office, the tones from the wall was used to create all colors used in the logos.</p>
                        <p>All the logos keep a similar motif with varying levels in the words. The image of the logo is to left. The constant look allows the logos to be instantly recognizable as a chamber event or activity.</p>
                        <p class="hidden-xs">Check out the additional logos below.</p>
                    </div>
                    <div class="col-sm-5 col-lg-4">
                        <p class="text-center"><img src="{{url('/')}}/img/samples/clarkston-chamber-of-commerce-mockup1.jpg" alt="Logo for Clarkston Area Chamber of Commerce" class="img-responsive center-block" /></p>
                    </div>
                </div>

                <div class="row margin-bottom-20">
                    <div class="col-sm-6">
                        <p class="text-center"><img src="{{url('/')}}/img/samples/clarkston-chamber-of-commerce-additional1.jpg" alt="Additional Logos for the Clarkston Area Chamber of Commerce" class="img-responsive center-block" /></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-center"><img src="{{url('/')}}/img/samples/clarkston-chamber-of-commerce-additional2.jpg" alt="Additional Logos for the Clarkston Area Chamber of Commerce" class="img-responsive center-block" /></p>
                    </div>
                </div>

                @if($client->testimonials)
                @foreach($client->testimonials as $testimonial)
                <div class="row">
                    <div class="col-md-7 col-lg-8 col-lg-offset-2">
                        <p class="testimonial"><strong>&ldquo;</strong> {{$testimonial->testimonial}} <strong>&rdquo;</strong></p>
                        <p class="testimonial-author text-right">&mdash; {{$testimonial->author}}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div><!-- /.modal-content -->
    <!--</div>--><!-- /.modal-dialog -->
</div><!-- /.modal -->