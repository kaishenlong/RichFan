<!-- @extends('users.layouts.default') -->

@section('content')
<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="owl-carousel owl-carousel-fullwidth product-carousel">
                    @foreach ( $product ->ProductImage as $image )
                    <div class="item">
							<div class="active text-center">
								<figure>
                                
										<img src="{{asset($image->image_url)}}" width="250px" height="350px" alt="user">
									
								</figure>
							</div>
						</div>
                        @endforeach
					</div>
                   
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2>{{$product->name}}</h2>
							<div class="col-md-10 col-md-offset-1">
									<span class="price">{{number_format($product->price)}}vnd</span>
									<p>{{$product->description}}</p>
								</div>
								<p>
							<form action="{{ route('client.addToCart') }}" method="post">
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<input type="number" name="quantity" value="1"> <br>
								<button class="btn btn-primary btn-outline btn-lg">Mua hàng</button>
							</form>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
    @endsection
