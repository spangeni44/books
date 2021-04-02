@extends('frontend.layouts.app')
@section('content')
<style>
.btn-styled {
    padding: 0.6rem 1.5rem;
}
.btn-facebook {
    color: #fff;
    background-color: #3b5998;
    border-color: #3b5998;
}
.btn-facebook:hover {
    color:white !important;
}
.btn-icon--2 {
    position: relative;
    padding-left: 40px !important;
}
.btn-styled {
    font-weight: 600;
    letter-spacing: 0;
    text-transform: capitalize;
    padding: 0.75rem 2rem;
}
.btn-icon--2 .icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    left: 0;
    top: 0;
    width: 40px;
    height: 100%;
    background: rgba(0, 0, 0, 0.2);
}
.btn-icon-left .icon, .btn-icon-left .fa {
    margin-right: 0.625rem;
}
</style>
    	<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
							<li class="breadcrumb-item active">Login</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<!--<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">-->
						<!-- Login Form s-->
					<!--	<form action="#">-->
					        @csrf
					<!--		<div class="login-form">-->
					<!--			<h4 class="login-title">New Customer</h4>-->
					<!--			<p><span class="font-weight-bold">I am a new customer</span></p>-->
					<!--			<div class="row">-->
					<!--				<div class="col-md-12 col-12 mb--15">-->
					<!--					<label for="email">Full Name</label>-->
					<!--					<input class="mb-0 form-control" type="text" id="name"-->
					<!--						placeholder="Enter your full name">-->
					<!--				</div>-->
					<!--				<div class="col-12 mb--20">-->
					<!--					<label for="email">Email</label>-->
					<!--					<input class="mb-0 form-control" type="email" id="email" placeholder="Enter Your Email Address Here..">-->
					<!--				</div>-->
					<!--				<div class="col-lg-6 mb--20">-->
					<!--					<label for="password">Password</label>-->
					<!--					<input class="mb-0 form-control" type="password" id="password" placeholder="Enter your password">-->
					<!--				</div>-->
					<!--				<div class="col-lg-6 mb--20">-->
					<!--					<label for="password">Repeat Password</label>-->
					<!--					<input class="mb-0 form-control" type="password" id="repeat-password" placeholder="Repeat your password">-->
					<!--				</div>-->
					<!--				<div class="col-md-12">-->
					<!--					<a href="#" class="btn btn-outlined">Register</a>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
					<!--	</form>-->
					<!--</div>-->
					<div class="col-sm-0 col-md-3 col-lg-3 col-xs-0">
					    
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
						<div class="">
                                    <form class="form-default" role="form" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                            <span>{{  translate('Use country code before number') }}</span>
                                        @endif
                                        <div class="form-group">
                                            @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                                <input type="text" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Email Or Phone')}}" name="email" id="email">
                                            @else
                                                <input type="email" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control h-auto form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password')}}" name="password" id="password">
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="checkbox pad-btm text-left">
                                                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="demo-form-checkbox" class="text-sm">
                                                            {{  translate('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="{{ route('password.request') }}" class="link link-xs link--style-3">{{ translate('Forgot password?')}}</a>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-styled btn-base-1 btn-md w-100">{{  translate('Login') }}</button>
                                        </div>
                                    </form>
                                    @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1 || \App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                        <div class="or or--1 mt-3 text-center">
                                            <span>or</span>
                                        </div>
                                        <div>
                                        @if (\App\BusinessSetting::where('type', 'facebook_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-facebook"></i> {{ translate('Login with Facebook')}}
                                            </a>
                                        @endif
                                        @if(\App\BusinessSetting::where('type', 'google_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 mb-3">
                                                <i class="icon fa fa-google"></i> {{ translate('Login with Google')}}
                                            </a>
                                        @endif
                                        @if (\App\BusinessSetting::where('type', 'twitter_login')->first()->value == 1)
                                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4">
                                                <i class="icon fa fa-twitter"></i> {{ translate('Login with Twitter')}}
                                            </a>
                                        @endif
                                        </div>
                                    @endif
                                </div>
					</div>
					<div class="col-sm-0 col-md-3 col-lg-3 col-xs-0">
					    
					</div>
				</div>
			</div>
		</main>
	</div>
@endsection








@section('script')
    <script type="text/javascript">
        function autoFillSeller(){
            $('#email').val('seller@example.com');
            $('#password').val('123456');
        }
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection
