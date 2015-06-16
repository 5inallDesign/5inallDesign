<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @include('master.templates.header')
    </head>
    <body data-spy="scroll" data-target="#topNav.spy-active" data-offset="61" class="{{isset($fullPage)?'modal-open':''}}">
        @include('master.templates.nav')
        @yield('body')
        @include('master.templates.footer')

        <script src="{{url('/')}}/js/jquery-1.11.3.min.js"></script>
        <script src="{{url('/')}}/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{url('/')}}/js/masonry.pkgd.min.js"></script>
        <script src="{{url('/')}}/js/modernizr.custom.71840.js"></script>
        <script src="{{url('/')}}/js/move-top.js"></script>
        <script src="{{url('/')}}/js/easing.js"></script>

        <!-- PHP to JS Variables -->
        <script>
            originURL = '{{$_SERVER["REQUEST_URI"]}}';
            requestURL = '{{$_SERVER["REQUEST_URI"]}}';
            domainURL = "{{url('/')}}";
            URLtitle = '{{$title}}';
        </script>
        <script src="{{url('/')}}/js/master.min.js"></script>

        @yield('footercode')

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