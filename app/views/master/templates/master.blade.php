<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        @include('master.templates.header')
    </head>
    <body data-spy="scroll" data-target="#topNav.spy-active" data-offset="61">
        @include('master.templates.nav')
        @yield('body')
        @include('master.templates.footer')
        <script src="{{url('/')}}/js/jquery-1.11.2.min.js"></script>
        <script src="{{url('/')}}/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{url('/')}}/js/masonry.pkgd.min.js"></script>
        <script src="{{url('/')}}/js/owl.carousel.min.js"></script>
        <script>
        var $container = $('#portfolio-grid');
            // initialize Masonry after all images have loaded  
            $container.imagesLoaded( function() {
              $container.masonry();
            });
        </script>

        <!-- start top_js_button -->
        <script type="text/javascript" src="{{url('/')}}/js/move-top.js"></script>
        <script type="text/javascript" src="{{url('/')}}/js/easing.js"></script>
        

        <script type="text/javascript">
          $(document).ready(function() {
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            $().UItoTop({ easingType: 'easeOutQuart' });
          });
        </script>

        <script type="text/javascript">
            //jQuery to shrink the navbar on scroll
            if ($(".navbar").offset().top > 250) {
                $(".navbar-fixed-top").addClass("nav-shrink");
            }
            $(window).scroll(function() {
                if ($(".navbar").offset().top > 250) {
                    $(".navbar-fixed-top").addClass("nav-shrink");
                } else {
                    $(".navbar-fixed-top").removeClass("nav-shrink");
                }
            });
        </script>
        @section('code')
            {{isset($code) ? $code : ''}}
        @show

        @yield('footercode')

        <script type="text/javascript">
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    navigation : true, // Show next and prev buttons
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem:true,
                    lazyLoad : true,
                    navigationText : ['<button class="btn btn-green"><span class="glyphicon glyphicon-chevron-left"></span></butto>','<button class="btn btn-green"><span class="glyphicon glyphicon-chevron-right"></span></button>'],
                });

                $('.modal').on('show.bs.modal', function ()
                {
                    $('#topNav-collapse.in').collapse('hide');
                    setTimeout( function () {
                    $('.modal.in .modal-backdrop').height($('.modal.in .modal-content').height() + 52);
                    } , 750 );
                });

            });

            var client = getUrlVars()["client"];
            $('#'+client+'Modal').modal('show');

            function getUrlVars() {
                var vars = {};
                var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                    vars[key] = value;
                });
                return vars;
            }
        </script>
        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-16197792-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
    
</html>