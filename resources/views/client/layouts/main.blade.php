<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('resources/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('resources/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('resources/css/contactstyle.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('resources/css/faqstyle.css')}}" type="text/css" media="all" />
<link href="{{asset('resources/css/single.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('resources/css/medile.css')}}" rel='stylesheet' type='text/css'/>
<link href="{{asset('resources/list-css/basictable.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('resources/list-css/list.css')}}" rel='stylesheet' type='text/css' />

<link href="{{asset('resources/news-css/news.css')}}" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<link href="{{asset('resources/css/jquery.slidey.min.css')}}" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="{{asset('resources/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('resources/css/font-awesome.min.css')}}" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="{{asset('resources/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/jquery.dotdotdot.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/jquery.magnific-popup.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/jquery.slidey.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/simplePlayer.js')}}"></script>

<script type="text/javascript" src="{{asset('resources/list-js/jquery.basictable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/list-js/jquery.mobile.custom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/list-js/jquery.tools.min.js')}}"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="{{asset('resources/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('resources/js/owl.carousel.js')}}"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script> 
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('resources/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head> 
<body>
    @section('header')
    @show
    @section('navbar')
    @show
    <section id="main-container">
		@yield('content')
	<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
    </nav>
    </div>
    </section>
<!-- //Latest-tv-series -->
<!-- footer -->
    @section('footer')
	@show
<!-- //here ends scrolling icon -->
</body>
</html>