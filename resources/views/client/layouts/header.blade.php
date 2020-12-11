@section('header')
<!-- header -->
<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="{{route('main')}}"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="{{route('movies')}}" method="get">
					<input type="text" name="name_movie" placeholder="Tìm kiếm phim theo tên" required="">
					<input type="submit" value="Go">
				</form>
			</div>
			<div class="w3l_sign_in_register">
				@if(Auth::user())
				<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img style="width: 40px;height: 40px;" alt="" src="{{Auth::user()->image_user}}">
                <span class="username">
                @if(Auth::user()->name_user!=null)
                {{Auth::user()->name_user}}
                @else
                <em>{{Auth::user()->auth->name_auth.' '.Auth::user()->id_user}}</em>
                @endif
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout" style="padding:0px;">
                <li style="width:100%"><a style="width:100%" href="{{route('account.detail',Auth::user()->id_user)}}"><i class=" fa fa-suitcase"></i>     Profile</a></li>
                <li style="width:100%"><a style="width:100%" href="{{route('account.setting')}}"><i class="fa fa-cog"></i> Settings</a></li>
                <li style="width:100%"><a style="width:100%" href="{{route('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
				@else
				<ul>
					<li><a href="#" id="loginButton" data-toggle="modal" data-target="#myModal">Login</a></li>
				</ul>
				@endif
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Sign In & Sign Up
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Click Me</div>
							  </div>
							  <div class="form">
							    @if(session()->has('login_message'))
                                <div id="login_message" class="{{ session()->get('class')}}" role="alert">
                                    <strong>{{ session()->get('login_message')}}</strong>
                                </div>
                                @endif
								<h3>Login to your account</h3>
								<form action="{{route('login.validate')}}" method="post">
								  @csrf
								  <input type="text" name="account_user" placeholder="Username" value="{{session()->get('account_user') ?? old('password')}}">
								  @error('account_user')
                                    <div class="help-block">{{$message}}</div>
                                  @enderror
								  <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
								  @error('password')
                                    <div class="help-block">{{$message}}</div>
                                  @enderror
								  <input type="submit" value="Login">
								</form>
							  </div>
							  <div class="form">
							 @if(session()->has('register_message'))
                                <div id="register_message" class="{{ session()->get('class')}}" role="alert">
                                    <strong>{{ session()->get('register_message')}}</strong>
                                </div>
                                @endif
								<h3>Create an account</h3>
								<form action="{{route('register')}}" method="post">
								@csrf
								  <input type="text" name="account_user" placeholder="Username" required="">
								  @error('account_user')
                                    <div class="help-block">{{$message}}</div>
                                  @enderror
								  <input type="password" name="password" placeholder="Password" required="">
								  @error('password')
                                    <div class="help-block">{{$message}}</div>
                                  @enderror
								  <input type="email" name="email_user" placeholder="Email Address" required="">
								  @error('email_user')
                                    <div class="help-block">{{$message}}</div>
                                  @enderror
								  <input type="submit" value="Register">
								</form>
							  </div>
							  <div class="cta"><a href="#">Forgot your password?</a></div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
		if(document.getElementById("login_message")){
			$(document).ready(function(){
                $('#loginButton').click();
            });
		}
		if(document.getElementById("register_message")){
			$(document).ready(function(){
				$('#loginButton').click();
				$('.toggle').click();
            });
		}
	</script>
@endsection