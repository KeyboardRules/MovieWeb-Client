@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')


@section('title','Trang chủ')
@section('content')
<link href="{{asset('resources/css/flexslider.css')}}" rel='stylesheet' type='text/css' />
<div id="slidey" style="display:none;">
		<ul>
            @foreach(App\Models\Movie::inRandomOrder()->limit(6)->get() as $movie)
			<li><img src="{{$movie->image_movie}}" alt=""><p class='title'>{{$movie->name_movie}}</p><p class='description'>{{$movie->content_movie}}</p></li>
            @endforeach
		</ul>   	
    </div>
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
        </script>
        <div class="banner-bottom">
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
                @foreach(App\Models\Movie::inRandomOrder()->limit(6)->get() as $movie)
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="{{route('movie.detail',$movie->id_movie)}}" class="hvr-shutter-out-horizontal"><img src="{{$movie->image_movie}}" title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="{{route('movie.detail',$movie->id_movie)}}">{{$movie->name_movie}}</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>{{ Carbon\Carbon::parse($movie->date_movie)->format('Y')}}</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
                                        <li><i class="fa @if($movie->score()<1&&$movie->score()>0) fa-star-half-o @elseif($movie->score()>=1) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										<li><i class="fa @if($movie->score()<2&&$movie->score()>1) fa-star-half-o @elseif($movie->score()>=2) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										<li><i class="fa @if($movie->score()<3&&$movie->score()>2) fa-star-half-o @elseif($movie->score()>=3) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										<li><i class="fa @if($movie->score()<4&&$movie->score()>3) fa-star-half-o @elseif($movie->score()>=4) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										<li><i class="fa @if($movie->score()<5&&$movie->score()>4) fa-star-half-o @elseif($movie->score()>=5) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>NEW</p>
							</div>
						</div>
                    </div>
                    @endforeach
                </div>
			</div>			
		</div>
    </div>
    <!-- popular -->
    <div class="Latest-tv-series">
		<h4 class="latest-text w3_latest_text w3_home_popular">10 bộ phim hay nhất</h4>
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
                        @foreach(App\Models\Movie::all()->sortByDesc('score')->take(10) as $movie)
						<li>
							<div class="agile_tv_series_grid">
								<div class="col-md-6 agile_tv_series_grid_left">
									<div class="w3ls_market_video_grid1">
										<img src="{{$movie->image_movie}}" alt=" " class="img-responsive" />
										<a class="w3_play_icon" href="#small-dialog{{$movie->id_movie}}">
											<span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
										</a>
									</div>
								</div>
								<div class="col-md-6 agile_tv_series_grid_right">
									<p class="fexi_header">{{$movie->name_movie}}</p>
									<p class="fexi_header_para"><span class="conjuring_w3">Cốt truyện<label>:</label></span> {{$movie->content_movie}}</p>
									<p class="fexi_header_para"><span>Ngày ra mắt<label> :</label></span> {{ Carbon\Carbon::parse($movie->date_movie)->format('M d Y')}} </p>
									<p class="fexi_header_para">
                                        <span>Thể loại<label>:</label> </span>
                                        @foreach($movie->categories as $category)
										<a href="{{route('movies.category',$category->name_category)}}">{{$category->name_category}}</a> | 
                                        @endforeach							
									</p>	
									<p class="fexi_header_para fexi_header_para1"><span>Đánh giá<label>:</label></span>
                                        <i class="fa @if($movie->score()<1&&$movie->score()>0) fa-star-half-o @elseif($movie->score()>=1) fa-star @else fa-star-o @endif" aria-hidden="true"></i>
										<i class="fa @if($movie->score()<2&&$movie->score()>1) fa-star-half-o @elseif($movie->score()>=2) fa-star @else fa-star-o @endif" aria-hidden="true"></i>
										<i class="fa @if($movie->score()<3&&$movie->score()>2) fa-star-half-o @elseif($movie->score()>=3) fa-star @else fa-star-o @endif" aria-hidden="true"></i>
										<i class="fa @if($movie->score()<4&&$movie->score()>3) fa-star-half-o @elseif($movie->score()>=4) fa-star @else fa-star-o @endif" aria-hidden="true"></i>
										<i class="fa @if($movie->score()<5&&$movie->score()>4) fa-star-half-o @elseif($movie->score()>=5) fa-star @else fa-star-o @endif" aria-hidden="true"></i>
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
                        </li>
						<div id="small-dialog{{$movie->id_movie}}" class="mfp-hide">
		                    <iframe src="{{$movie->trailer_movie}}"></iframe>
	                    </div>
                        @endforeach
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
	</div>
	<!-- pop-up-box -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
        @endsection