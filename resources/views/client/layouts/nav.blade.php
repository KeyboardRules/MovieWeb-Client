@section('navbar')
<!-- nav -->
<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{route('main')}}">Trang chủ</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Thể loại<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
									@php
									$categories=App\Models\Category::all();
									$i=0;
									@endphp
									@foreach($categories as $category)
									@if($i==0)
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
									@endif
									<li><a href="{{route('movies.category',$category->name_category)}}">{{$category->name_category}}</a></li>
									@php
									$i++;
									@endphp
									@if($i%6==0||$category==$categories->last())
									    </ul>
									</div>
									@php
									$i=0;
									@endphp
									@endif
									@endforeach	
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="">Blogs</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Rạp chiếu phim <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
									@php
									$theaters=App\Models\Theater::all();
									$i=0;
									@endphp
									@foreach($theaters as $theater)
									@if($i==0)
									<div class="col-sm-6">
										<ul class="multi-column-dropdown">
									@endif
									<li><a href="{{route('theater.detail',$theater->id_theater)}}">{{$theater->name_theater}}</a></li>
									@php
									$i++;
									@endphp
									@if($i%6==0||$theater==$theaters->last())
									    </ul>
									</div>
									@php
									$i=0;
									@endphp
									@endif
									@endforeach
										<div class="clearfix"></div>
									</li>
								</ul>
							</li>
							<li><a href="{{route('movies')}}">Danh sách phim</a></li>
							<li><a href="">Giới thiệu</a></li>
						</ul>
					</nav>
				</div>
			</nav>	
		</div>
    </div>
    <!-- //nav -->
    @endsection