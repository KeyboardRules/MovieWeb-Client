@extends('client.layouts.main')
@extends('client.layouts.footer')
@extends('client.layouts.header')
@extends('client.layouts.nav')


@section('title','Danh sách phim')
@section('content')
<link href="{{asset('resources/list-css/table-style.css')}}" rel='stylesheet' type='text/css' />
<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">Movies List</h4>
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="{{route('main')}}">Trang chủ</a></li>
					  <li class="active">Danh sách</li>
					</ol>
				</div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>Search Results : <span>{{$movies->count()}}</span></h4>
                    </div>
                    @if($movies->count()==0)
                    <h3 style="text-align:center;">Không có kết quả cho bộ phim này</h3>
                    @else
									<table id="table-breakpoint">
										<thead>
										  <tr>
											<th>No.</th>
											<th>Tên phim</th>
											<th>Năm ra mắt</th>
											<th>Độ dài</th>
											<th>Thể loại</th>
											<th>Rating</th>
										  </tr>
										</thead>
										<tbody>
                      @php
                      $i=1;
                      @endphp
                      @foreach($movies as $movie)
                      <tr>
                      <td>{{$i++}}</td>
											<td class="w3-list-img"><a href="{{route('movie.detail',$movie->id_movie)}}"><img style="height:58px;" @if($movie->image_movie!=null) src="{{$movie->image_movie}}" @else src="{{asset('resources/images/movie.jpg')}}" @endif alt="" /> <span>{{$movie->name_movie}}</span></a></td>
											<td>{{ Carbon\Carbon::parse($movie->date_movie)->format('Y')}}</td>
											<td>{{$movie->length_movie}} phút</td>
											<td class="w3-list-info">
                      @foreach($movie->categories as $category)
                      <a href="{{route('movies.category',$category->name_category)}}">{{$category->name_category}}</a><span>,</span>
                      @endforeach
                      </td>
                      <td>{{$movie->score()}}</td>
                      </tr>
                      @endforeach
										</tbody>
                    </table>
                    @endif
								</div>
                   </div>
                  </div>
                </div>
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
    </div>
    @endsection