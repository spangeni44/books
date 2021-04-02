@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-section">
	<h2 class="sr-only">Site Breadcrumb</h2>
	<div class="container">
		<div class="breadcrumb-contents">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active">Publications</li>
				</ol>
			</nav>
		</div>
	</div>
</section>
<div class="py-4 gry-bg">
    <div class="mt-4">
        <div class="container">
            <div class="bg-white px-3 pt-3">
                <div class="row gutters-10">
                    @foreach (\App\Publication::all() as $publication)
                        <div class="col-xxl-2 col-lg-4 col-sm-6 text-center">
                            <a href="{{ route('products.publication', $publication->slug) }}" class="d-block p-3 mb-3 border rounded">
                                <img src="{{ my_asset($publication->logo) }}" class="lazyload img-fit" height="50" alt="{{  translate($publication->name) }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
