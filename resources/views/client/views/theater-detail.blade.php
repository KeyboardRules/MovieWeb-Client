@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')

@section('title',$theater->name_theater)
@section('content')

<div class="container">
<div class="row">
<div class="agileinfo-news-top-grids">
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
                                <img style="max-width:100%;" width="auto" height="400" src="{{$theater->image_theater}}" alt="image of theater">
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
                Những bộ phim đang chiếu tại rạp
            </header>
            <div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($theater->movies as $movie)
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
        </section>
        </div>
</div>
</div>
</div>
@endsection