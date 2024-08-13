@extends('users.layouts.default')
@section('content')

<!-- san pham  -->
<div id="fh5co-product">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<span>Cool Stuff</span>
				<h2>Products.</h2>
			</div>
		</div>
		<div class="container">
				<div class="option-menu">
						<ul >
							<li >
								<a href="{{route('client.home')}}#all">Tất cả</a>
							</li>
							@foreach($categories as $category)
								<li>
									<a 
										href="{{route('client.category', ['id' => $category->id])}}#all">{{ $category->name }}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			<div class="tab-content">
				<div class="" id="all">
					@foreach ($listProduct as $value)
						<div class="card col-md-4 col-sm-12 text-center">
							@foreach ($value->ProductImage->take(1) as $image)
								<img src="{{asset($image->image_url)}}" class="card-img-top" width="250px" height="130px">
							@endforeach
							<div class="card-body">
								<h3 class="card-title">{{$value->name}}</h3>
								<p class="card-text">{{$value->description}}</p>
								<a href="{{ route('client.detailProduct', ['id' => $value->id]) }}"
									class="btn btn-primary">Xem ngay</a>
							</div>
						</div>
					@endforeach
				</div>
				@if (session('error'))
                <div class="alert alert-primary" role="alert">
                    <h3 class="text-danger">{{session('error')}}</h3>
                </div>
                @endif


			</div>
		</div>
	</div>
</div>

@endsection

@push('script')

@endpush