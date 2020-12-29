@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')


@section('title',$movie->name_movie)
@section('content')
<div class="single-page-agile-main">
<script>
	$("document").ready(function() {
		$("#video").simplePlayer();
	});
</script>
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="{{route('main')}}">Trang chủ</a></li>
				  <li class="active">Phim</li>
				</ol>
			</div>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<h1>{{$movie->name_movie}}</h1>	
					    </div>
						<div class="video-grid-single-page-agileits">	
							<div data-video="{{$movie->trailer_movie}}" id="video"> <img @if($movie->image_movie!=null) src="{{$movie->image_movie}}" @else src="{{asset('resources/images/movie.jpg')}}" @endif alt="" class="img-responsive" /> </div>
						</div>
                    </div>
                    <div class="col-sm-12 wthree-top-news-left">
						<div class="wthree-news-left">
							<div class="wthree-news-left-img">
							<header class="panel-heading">
							    Thông tin phim cơ bản
                            </header>
								<div class="w3-agile-news-text">
								<h4 style="font-size: 1.6em;">Thông tin phim</h4>
								
                                <div class="form-horizontal bucket-form">
                                <div class="form-group">
                                    <label class="col-sm-2">Thời lượng</label>
                                    <div class="col-sm-10">
                                        <p>{{$movie->length_movie}} phút</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Ngày ra mắt</label>
                                    <div class="col-sm-10">
                                        <p>{{Carbon\Carbon::parse($movie->date_movie)->format('M d Y')}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Thể loại</label>
                                    <div class="col-sm-10">
                                    <p>
                                        @foreach($movie->categories as $category)
                                        {{$category->name_category}},
                                        @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="col-sm-2">Điểm số</label>
									<div class="col-sm-10" style="margin:8px 0px;">
									<div class="block-stars" style="float:left;">
										<ul class="w3l-ratings">
										    <li><i class="fa fa-lg @if($movie->score()<1&&$movie->score()>0) fa-star-half-o @elseif($movie->score()>=1) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa fa-lg @if($movie->score()<2&&$movie->score()>1) fa-star-half-o @elseif($movie->score()>=2) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa fa-lg @if($movie->score()<3&&$movie->score()>2) fa-star-half-o @elseif($movie->score()>=3) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa fa-lg @if($movie->score()<4&&$movie->score()>3) fa-star-half-o @elseif($movie->score()>=4) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa fa-lg @if($movie->score()<5&&$movie->score()>4) fa-star-half-o @elseif($movie->score()>=5) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										</ul>
									</div>
                                    </div>
                                </div>
                                </div>
                                <h4 style="font-size: 1.6em;">Nội dung</h4>
									<p>
                                        {{$movie->content_movie}}
									</p>
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
					<div class="all-comments">
						<div class="all-comments-info">
						<header class="panel-heading">
						    Đánh giá phim
                        </header>
							<div class="agile-info-wthree-box">
							@if(session()->has('review_message'))
                                <div class="{{ session()->get('class')}}" role="alert">
                                <strong>{{ session()->get('review_message')}}</strong>
                                </div>
                            @endif
								@if(Auth::User()==null)
								</br>
								<div class="media">
								<h3 style="text-align:center;font-size: 1.6em;font-weight: 600;">Bạn phải đăng nhập để thực hiên đánh giá</h3>
                                </div>
								@elseif($review=App\Models\Review::query()->where('person_review',Auth::User()->id_user)->where('movie_review',$movie->id_movie)->first())
                                </br>
								<h3 style="text-align:center;font-size: 1.6em;font-weight: 600;">Bạn phải đã đánh giá phim này</h3>
							    <div class="media panel">
								<h5>
									<a href="{{route('account.detail',$review->user->id_user)}}"><h3 style="display:inline-block;">{{$review->user->name_user}}   </h3></a> 
									<a href="{{route('movie.detail',$review->movie->id_movie)}}">{{ Carbon\Carbon::parse($review->created_at)->format('M d Y')}}</a>
                                </h5>
								    <div class="media-left">
									    <a href="{{route('account.detail',$review->user->id_user)}}">
										    <img style="width: 40px;height: 40px;" @if($review->user->image_user!=null) src="{{$review->user->image_user}}" @else src="{{asset('resources/images/avatar.png')}}" @endif title="One movies" alt=" " />
									    </a>
								    </div>
								    <div class="media-body">
										<p>{{$review->content_review}}</p>
										<div class="block-stars" style="float:left;">
										<ul class="w3l-ratings">
										    <li><i class="fa @if($review->score_review<1&&$review->score_review>0) fa-star-half-o @elseif($review->score_review>=1) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<2&&$review->score_review>1) fa-star-half-o @elseif($review->score_review>=2) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<3&&$review->score_review>2) fa-star-half-o @elseif($review->score_review>=3) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<4&&$review->score_review>3) fa-star-half-o @elseif($review->score_review>=4) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<5&&$review->score_review>4) fa-star-half-o @elseif($review->score_review>=5) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										</ul>
									</div>
								    </div>
							   </div>
							   @else
								<form action="{{route('review.submit',$movie->id_movie)}}" method="post">
								@csrf
                                    @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Please fix the following errors<strong>
                                    </div>
                                @endif
								    <link href="{{asset('resources/css/rating.css')}}" rel='stylesheet' type='text/css'/>
								    <div class="rate">
                                        <input type="radio" id="star5" name="score_review" value="5"/>
                                        <label for="star5" title="5 stars">5 stars</label>
                                        <input type="radio" id="star4" name="score_review" value="4" />
                                        <label for="star4" title="4 stars">4 stars</label>
                                        <input type="radio" id="star3" name="score_review" value="3" />
                                        <label for="star3" title="3 stars">3 stars</label>
                                        <input type="radio" id="star2" name="score_review" value="2" />
                                        <label for="star2" title="2 stars">2 stars</label>
                                        <input type="radio" id="star1" name="score_review" value="1" />
										<label for="star1" title="1 stars">1 star</label>
									</div>
									@error('score_review')
									<br><br>
                                        <div class="help-block">{{$message}}</div>
                                    @enderror
									<textarea placeholder="Nội dung đánh giá" type="text" name="content_review" required>{{old('content_review')}}</textarea>
									@error('content_review')
                                        <div class="help-block">{{$message}}</div>
                                    @enderror
									<input type="submit" value="Gửi">
									<div class="clearfix"> </div>
								</form>
								@endif
							</div>
						</div>
						<header class="panel-heading">
						Các Đánh giá
                        </header>
							<h3></h3>
							@if($reviews->count()==0)
                            </br>
							<h3 style="text-align:center;">Phim chưa có đánh giá nào.Hãy đánh giá luôn nào!!!</h3>
							@else
							@foreach($reviews as $review)
							<div class="panel media">
							    <h5>
									<a href="{{route('account.detail',$review->user->id_user)}}"><h3 style="display:inline-block;">{{$review->user->name_user}}   </h3></a> 
									<a href="{{route('movie.detail',$review->movie->id_movie)}}">{{ Carbon\Carbon::parse($review->created_at)->format('M d Y')}}</a>
                                </h5>
								    <div class="media-left">
									    <a href="{{route('account.detail',$review->user->id_user)}}">
										    <img style="width: 40px;height: 40px;" @if($review->user->image_user!=null) src="{{$review->user->image_user}}" @else src="{{asset('resources/images/avatar.png')}}" @endif title="One movies" alt=" " />
									    </a>
								    </div>
								    <div class="media-body">
									    <p>{{$review->content_review}}</p>
									<div class="block-stars" style="float:left;">
									    <ul class="w3l-ratings">
										    <li><i class="fa @if($review->score_review<1&&$review->score_review>0) fa-star-half-o @elseif($review->score_review>=1) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<2&&$review->score_review>1) fa-star-half-o @elseif($review->score_review>=2) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<3&&$review->score_review>2) fa-star-half-o @elseif($review->score_review>=3) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<4&&$review->score_review>3) fa-star-half-o @elseif($review->score_review>=4) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
											<li><i class="fa @if($review->score_review<5&&$review->score_review>4) fa-star-half-o @elseif($review->score_review>=5) fa-star @else fa-star-o @endif" aria-hidden="true"></i></li>
										</ul>
									</div>
									</div>
							   </div>
							@endforeach
							@endif
		@if($reviews->count()!=0)
        <div class="blog-pagenat-wthree">                
          <ul>
            @if($reviews->currentPage()!=1)
            <li><a href="{{ $reviews->appends(request()->input())->url($reviews->currentPage()-1)}}"><i class="fa fa-chevron-left"></i></a></li>
            @endif
            @if($reviews->currentPage() > 3)
            <li><a href=" {{ $reviews->appends(request()->input())->url(1) }} ">1</a></li>
            @endif
            @if($reviews->currentPage() > 4)
            <li><a disabled>...</a></li>
            @endif

            @for($i=1;$i<=$reviews->lastPage();$i++)
            @if($i >= $reviews->currentPage() - 2 && $i <= $reviews->currentPage() + 2)
                @if ($i == $reviews->currentPage())
                    <li><a href="{{ $reviews->appends(request()->input())->url($i) }}" class="frist">{{$i}}</a></li>
                @else
                    <li><a href="{{ $reviews->appends(request()->input())->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
            @endfor
            @if($reviews->currentPage() < $reviews->lastPage()-3)
            <li><a disabled>...</a></li>
            @endif
            @if($reviews->currentPage() < $reviews->lastPage()-2)
            <li><a href="{{ $reviews->appends(request()->input())->url($reviews->lastPage())}}">{{$movies->lastPage()}}</a></li>
            @endif
            @if($reviews->currentPage()!= $reviews->lastPage() and $reviews->lastPage() > 1)
            <li><a href="{{ $reviews->appends(request()->input())->url($reviews->currentPage()+1)}}"><i class="fa fa-chevron-right"></i></a></li>
            @endif
          </ul>
        </div>
        @endif
						</div>
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>Tin tức mới</h3>
					<div class="single-grid-right">
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{asset('resources/images/c5.jpg')}}" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{asset('resources/images/c5.jpg')}}" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{asset('resources/images/c5.jpg')}}" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="single.html"><img src="{{asset('resources/images/c5.jpg')}}" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="single.html" class="title"> Nullam interdum metus</a>
								<p class="author"><a href="#" class="author">John Maniya</a></p>
								<p class="views">2,114,200 views</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
				<!-- //movie-browse-agile -->
				<!--body wrapper start-->
		<div class="agileinfo-news-top-grids">
		<div class="col-sm-12 wthree-top-news-left">
		<section class="panel">
            <header class="panel-heading">
                Những rạp đã chiếu phim {{$movie->name_movie}}
            </header>
            <div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($movie->theaters as $theater)
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="{{route('theater.detail',$theater->id_theater)}}" class="hvr-shutter-out-horizontal"><img @if($theater->image_theater!=null) src="{{$theater->image_theater}}" @else src="{{asset('resources/images/theater.png')}}" @endif title="album-name" class="img-responsive" alt=" " />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="{{route('theater.detail',$theater->id_theater)}}">{{$theater->name_theater}}</a></h6>							
								</div>
							</div>
							<div><p>{{Carbon\Carbon::parse($theater->pivot->from_date)->format('M d Y')}} - {{Carbon\Carbon::parse($theater->pivot->to_date)->format('M d Y')}}</P></div>
						</div>
                    </div>
                    @endforeach
				</div>
			</div>
        </section>
        </div>
</div>
		<!--body wrapper end-->				 
				</div>
				<!-- //w3l-latest-movies-grids -->
			</div>	
		</div>
@endsection