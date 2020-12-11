@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')

@section('title','Chi tiết tài khoản')
@section('content')

<div class="container">
<div class="row">
<div class="agileinfo-news-top-grids">
<div class="col-sm-12 wthree-top-news-left">
	<div class="wthree-news-left">
        <section class=""> 
            <header class="panel-heading">
                Thông tin người dùng
            </header>
            <div class="panel-body">
            @if(session()->has('message'))
            <div class="{{ session()->get('class')}}" role="alert">
                <strong>{{ session()->get('message')}}</strong>
            </div>
            @endif
                <div class="col-sm-5">
                    <section class="">
                        <div class="panel-body">
                            <div class="cover text-center" style="width:100%">
                                <img style="max-width:100%;" width="auto" height="400" src="{{$user->image_user}}">
                                <p style="margin-top:5px;"><em>Ảnh đại diện</em></p>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-sm-7">
                    <section class="">
                        <div class="panel-body">
                            <div class="form-horizontal bucket-form">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên người dùng</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{$user->name_user}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Giới tính</label>
                        <div class="col-sm-8">
                            @if($user->gender_user==1)
                            <p class="form-control-static">Nam</p>
                            @else
                            <p class="form-control-static">Nữ</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sinh nhật</label>
                        <div class="col-sm-8">
                            <p class="form-control-static">{{Carbon\Carbon::parse($user->birth_user)->format('M d Y')}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Chức vụ</label>
                        <div class="col-sm-8">
                        <p class="form-control-static">{{$user->auth->name_auth}}</p>
                        </div>
                    </div>
                    @if(Auth::user()!=null&&Auth::user()->id_user==$user->id_user)
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-12">
                            <form action="" method="post">
                                @csrf
                                <a class="btn btn-primary" href="{{route('account.setting')}}">Chỉnh sửa thông tin</a>  
                                <a class="btn btn-danger" href="">Danh sách phim yêu thích</a>  
                                <a class="btn btn-success" href="">Thể loại yêu thích</a> 
                            </form>
                        </div> 
                    </div>
                    @endif
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
    <div class="wthree-news-left">
        <section class>
            <header class="panel-heading">
                Đánh giá và bình luận
            </header>
            <div class="panel-body">
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
										    <img style="width: 40px;height: 40px;" src="{{$review->user->image_user}}" title="One movies" alt=" " />
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
        </section>
        </div>
        </div>
</div>
</div>
</div>
@endsection