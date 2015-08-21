/* Predefined variables */
/* global requestURL */
/* global URLtitle */
/* global domainURL */
/* global Modernizr */

/* Check Logo Support */
if (!Modernizr.svg) {
    $('.logo').attr('src', domainURL+'/img/5inalldesign.png');
}

/* Masonry Initializer */
var $container = $('#portfolio-grid');
// initialize Masonry after all images have loaded  
$container.imagesLoaded( function()
{
	$container.masonry();
});

/* To Top Button */
$(document).ready(function() {
    $().UItoTop({ easingType: 'easeOutQuart' });
});

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

/* Modal Functionality */
$(document).ready(function() {
    $('.modal').on('show.bs.modal', function ()
    {
        $('#topNav-collapse.in').collapse('hide');
        setTimeout( function () {
        $('.modal.in .modal-backdrop').height($('.modal.in .modal-content').height() + 52);
        } , 750 );
    });
});

// Portfolio Functions
var portfolioSlug = '';
$('.portfolio-link').click(function(event)
{
    if($('html').hasClass('history'))
    {
        event.preventDefault();
        var url = $(this).attr("href");
        portfolioSlug = $(this).data('portfolio');
        var stateObject = {};
        var title = $(this).data('portfolio')+" | 5inallDesign by Matt Crandell";
        history.pushState(stateObject,title,url);
        $('#'+portfolioSlug+'Modal').modal('show');
        $('#'+portfolioSlug+'-carousel').carousel(0);
    }
});
window.onpopstate = function()
{
    if($('html').hasClass('history'))
    {
        if ((window.location.pathname === requestURL) && (portfolioSlug !== ''))
        {
            $('#'+portfolioSlug+'Modal').modal('hide');
        }
        else if ((window.location.pathname === requestURL) && (portfolioSlug === ''))
        {
            var stateObject = {};
            var title = URLtitle;
            history.pushState(stateObject,title,requestURL);
        }
        else if ((window.location.pathname !== '/') && (portfolioSlug !== ''))
        {
            $('#'+portfolioSlug+'Modal').modal('show');
        }
    }
};
$('.modal').on('hidden.bs.modal', function ()
{
    if($('html').hasClass('history'))
    {
        var stateObject = {};
        var title = URLtitle;
        history.replaceState(stateObject,title,requestURL);
    }
});

/* Contact Form */
$('.contact-container .form').submit(function(event)
{
    event.preventDefault();
    $('.contact-container .form .btn-submit').button('loading');
    if ($('.contact-container .form #name').val() === '')
    {
        $('.contact-container .form #name').parent().addClass('has-error');
        $('.contact-container .form .btn-submit').button('reset');
    }
    if ($('.contact-container .form #email').val() === '')
    {
        $('.contact-container .form #email').parent().addClass('has-error');
        $('.contact-container .form .btn-submit').button('reset');
    }
    if ($('.contact-container .form #message').val() === '')
    {
        $('.contact-container .form #message').parent().addClass('has-error');
        $('.contact-container .form .btn-submit').button('reset');
    }
    if (($('.contact-container .form #name').val() !== '') && ($('.contact-container .form #email').val() !== '') && ($('.contact-container .form #message').val() !== ''))
    {
        $.ajax({
            type: 'POST',
            url: domainURL+'/submit-contact',
            data: $('.contact-container .form').serialize(),
            dataType: 'json',
            async: true,
            success: function(result)
            {
                $('.contact-container .form .has-error').removeClass('has-error');
                $('.contact-container .form .btn-submit').button('reset');
                $('#contactModal .thanks-name').html(result.name);
                $('#contactModal').modal('show');
            }
        });
    }
    //just to be sure its not submiting form
    return false;
});
$('#contactModal .contact-close').click(function()
{
    $('#contactModal .thanks-name').html('');
    $('.contact-container .form #name').val('');
    $('.contact-container .form #email').val('');
    $('.contact-container .form #message').val('');
});