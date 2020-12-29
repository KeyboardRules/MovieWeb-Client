@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')

@section('title','Giới thiệu')
@section('content')
<link href="{{asset('resources/css/intro.css')}}" rel='stylesheet' type='text/css'/>
<div class="general-agileits-w3l">
	<div class="w3l-medile-movies-grids">
	<div class="movie-browse-agile">
	<div class="browse-agile-w3ls general-w3ls">
    <div class="tittle-head">
	<h4 class="latest-text">Giới thiệu </h4>
		<div class="container">
			<div class="agileits-single-top">
				<ol class="breadcrumb">
					<li><a href="{{route('main')}}">Trang chủ</a></li>
					<li class="active">Giới thiệu</li>
				</ol>
            </div>
            <div class="row">
				<section>
					<div class="intro-content">
						<div class="banner" style="background-image:url({{asset('resources/images/banner.png')}});"></div>
						<div class="bg-text">
							<h1>Chào mừng đến với trang web phim số một của Việt Nam</h1>
						<div>
                    </div>
                </section>
			    <section>
				    <div class="intro-content">
					    <h2 class="intro-content-header">Bạn có thể làm gì tại đây?</h3>
						<div class="intro-content-items-2">
						    <div class="intro-content-item">
								<img class="intro-content-item-img" src="{{asset('resources/images/ranking.png')}}">
								<p class="intro-content-item-head-text">
									Đánh giá phim
                                </p>
								<p class="intro-content-item-text">
									Đánh giá nhưng phim mà bạn đã xem cho công đồng phim.
									Bạn có thể đánh giá số điểm của mỗi phim trên thang điểm 1-5 và 
									cho mọi người xem cảm nhận của bạn về bộ phim khi bạn xem nó.
								</p>
							</div>
							<div class="intro-content-item">
								<img class="intro-content-item-img" src="{{asset('resources/images/update.png')}}">
								<p class="intro-content-item-head-text">
									Cập nhập thường xuyên
                                </p>
								<p class="intro-content-item-text">
									Các thông tin của phim sẽ được trang web update thường xuyên và nhanh
									 chóng để người dùng có thể có được thông tin nhưng phim mình muốn xem cũng như
									 tại rạp nhanh nhất có thể.
								</p>
							</div>
						</div>
					</div>
				</section>
				<section>
				    <div class="intro-content" style="background-color: #f6f6f6;">
					    <h2 class="intro-content-header">Tham gia công đồng phim</h3>
						<div class="intro-content-items-2">
						    <div class="intro-content-item">
								<img class="intro-content-item-img" src="{{asset('resources/images/forum.png')}}">
								<p class="intro-content-item-head-text">
									Thảo luận với người dùng khác
                                </p>
								<p class="intro-content-item-text">
									Nên tảng forum to lớn trên trang web của chúng tôi là nơi tuyệt nhất để thảo luận
									với người dùng khác về những bộ phim mà bạn đã xem.
								</p>
							</div>
							<div class="intro-content-item">
								<img class="intro-content-item-img" src="{{asset('resources/images/connect.png')}}">
								<p class="intro-content-item-head-text">
									Kết nối với cộng đồng phim
                                </p>
								<p class="intro-content-item-text">
									Kết nối tới cộng đồng phim Việt Nam lớn nhất với hơn 200 triệu người đã đăng ký
									và 500.000 người dùng mỗi ngày!
								</p>
							</div>
						</div>
					</div>
				</section>
				<section>
				    <div class="intro-content">
						<div class="intro-content-image" style="background-image:url({{asset('resources/images/family-movie.png')}});"></div>
						<div class="bg-text">
							<h2>Bạn còn đợi gì nữa</h2>
							<h1>Hãy tham gia cộng động phim lớn nhất Việt Nam thôi nào !</h1>
						</div>
				</section>
			</div>
        </div>
    </div>
</div>
</div>
</div>
</div>   
@endsection