@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')


@section('title',$category)
@section('content')
<div class="general-agileits-w3l">
		<div class="w3l-medile-movies-grids">
				<!-- /movie-browse-agile -->
				      <div class="movie-browse-agile">
					     <!--/browse-agile-w3ls -->
						<div class="browse-agile-w3ls general-w3ls">
								<div class="tittle-head">
									<h4 class="latest-text">{{$category}} </h4>
									<div class="container">
										<div class="agileits-single-top">
											<ol class="breadcrumb">
											  <li><a href="{{route('main')}}">Trang chủ</a></li>
											  <li class="active">Thể loại</li>
											</ol>
										</div>
									</div>
								</div>
						<div class="container">
							<div class="browse-inner">
							@if($movies->count()==0)
                                <h3 style="text-align:center;">Không có bộ phim nào thuộc thể loại này</h3>
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
                                        <div class="ribben two">
										    <p>NEW</p>
									    </div>	
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
@endsection