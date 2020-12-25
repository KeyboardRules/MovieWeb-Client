@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')

@section('title',$theater->name_theater)
@section('content')
<div class="general-agileits-w3l">
	<div class="w3l-medile-movies-grids">
	<div class="movie-browse-agile">
	<div class="browse-agile-w3ls general-w3ls">
    <div class="tittle-head">
	<h4 class="latest-text">{{$theater->name_theater}} </h4>
		<div class="container">
			<div class="agileits-single-top">
				<ol class="breadcrumb">
					<li><a href="index.html">Trang chủ</a></li>
					<li class="active">Rạp phim</li>
				</ol>
			</div>
		</div>
	</div>
<div class="container">
<div class="row">
    <div class="col-sm-12 wthree-top-news-left">
	<div class="wthree-news-left">
    <section class=""> 
            <header class="panel-heading">
                Thông tin rạp chiếu phim
            </header>
            <div class="panel-body">
                <div class="col-sm-5">
                    <section class="">
                        <div class="panel-body">
                            <div class="cover text-center" style="width=100%">
                                <img style="max-width:100%;" width="auto" height="400" @if($theater->image_theater!=null) src="{{$theater->image_theater}}" @else src="{{asset('resources/images/theater.png')}}" @endif alt="image of theater">
                                <p style="margin-top:5px;"><em>Ảnh rạp</em></p>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-sm-7">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-horizontal bucket-form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên rạp</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{$theater->name_theater}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{$theater->address_theater}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giới thiệu chung</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{$theater->description_theater}}</p>
                        </div>
                    </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="agileinfo-news-top-grids">
<div class="col-sm-12 wthree-top-news-left">
<section class="panel">
            <header class="panel-heading">
                Top 10 phim đã chiếu tại rạp
            </header>
            <div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($theater->movies->sortBy('score()')->take(10) as $movie)
					<div class="item">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
							<a href="{{route('movie.detail',$movie->id_movie)}}" class="hvr-shutter-out-horizontal"><img @if($movie->image_movie!=null) src="{{$movie->image_movie}}" @else src="{{asset('resources/images/movie.jpg')}}" @endif title="album-name" class="img-responsive" alt=" " />
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
        </section>
</div>
</div>

	</div>
	</div>
    <div class="tittle-head">
	<h4 class="latest-text">Những phim đã chiếu tại rạp chiếu phim quốc gia</h4>
</div>
<div class="container">
    <div class="browse-inner">
    @if($movies->count()==0)
        <h3 style="text-align:center;">Rạp chưa chiếu phim nào</h3>
    @endif
    @foreach($movies as $movie)
        <div class="col-md-2 w3l-movie-gride-agile">
            <a href="{{route('movie.detail',$movie->id_movie)}}" class="hvr-shutter-out-horizontal"><img @if($movie->image_movie!=null) src="{{$movie->image_movie}}" @else src="{{asset('resources/images/movie.jpg')}}" @endif title="album-name" alt=" " />
            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
            </a>
            <div class="mid-1">
                <div class="w3l-movie-text">
                    <h6><a href="{{route('movie.detail',$movie->id_movie)}}">{{$movie->name_movie}}</a></h6>							
                </div>
                <div class="mid-2">
                    <p>{{ Carbon\Carbon::parse($movie->date_movie)->format('Y')}}</p>
                    <div class="block-stars">
                        <ul class="w3l-ratings">
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div><p>{{Carbon\Carbon::parse($movie->pivot->from_date)->format('M d Y')}} - {{Carbon\Carbon::parse($movie->pivot->to_date)->format('M d Y')}}</P></div>
        </div>
        </div>
        @endforeach
        <div class="clearfix"> </div>
        </div>
    </div>
				<!--//browse-agile-w3ls -->
        @if($movies->count()!=0)
        <div class="blog-pagenat-wthree">                
          <ul>
            @if($movies->currentPage()!=1)
            <li><a href="{{ $movies->appends(request()->input())->url($movies->currentPage()-1)}}"><i class="fa fa-chevron-left"></i></a></li>
            @endif
            @if($movies->currentPage() > 3)
            <li><a href=" {{ $movies->appends(request()->input())->url(1) }} ">1</a></li>
            @endif
            @if($movies->currentPage() > 4)
            <li><a disabled>...</a></li>
            @endif

            @for($i=1;$i<=$movies->lastPage();$i++)
            @if($i >= $movies->currentPage() - 2 && $i <= $movies->currentPage() + 2)
                @if ($i == $movies->currentPage())
                    <li><a href="{{ $movies->appends(request()->input())->url($i) }}" class="frist">{{$i}}</a></li>
                @else
                    <li><a href="{{ $movies->appends(request()->input())->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
            @endfor

            @if($movies->currentPage() < $movies->lastPage()-3)
            <li><a disabled>...</a></li>
            @endif
            @if($movies->currentPage() < $movies->lastPage()-2)
            <li><a href="{{ $movies->appends(request()->input())->url($movies->lastPage())}}">{{$movies->lastPage()}}</a></li>
            @endif

            @if($movies->currentPage()!= $movies->lastPage() and $movies->lastPage() > 1)
            <li><a href="{{ $movies->appends(request()->input())->url($movies->currentPage()+1)}}"><i class="fa fa-chevron-right"></i></a></li>
            @endif
          </ul>
        </div>
        @endif
					</div>
				    <!-- //movie-browse-agile -->
				</div>	
			</div>	
		</div>
	<!-- //w3l-medile-movies-grids -->
	</div>
    </div>
</div>

@endsection