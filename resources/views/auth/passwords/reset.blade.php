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
							<li class="breadcrumb-item active">Reset Password</li>
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
					<div class="col-sm-0 col-md-3 col-lg-3 col-xs-0">
					    
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 col-xs-12">
					    <h1 class="h3">{{ translate('Reset Password') }}</h1>
                        <p class="pad-btm">{{translate('Enter your email address and new password and confirm password.')}} </p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
            
                            <input type="hidden" name="token" value="{{ $token }}">
            
                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="{{ translate('Email') }}" required autofocus>
            
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
            
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ translate('New Password') }}" required>
            
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
            
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ translate('Confirm Password') }}" required>
                            </div>
            
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    {{ translate('Reset Password') }}
                                </button>
                            </div>
                        </form>
					    
					 </div>
				</div>
			</div>
		</main>
@endsection

