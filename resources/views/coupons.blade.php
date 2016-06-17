@extends('layouts.master')

@section('content')


	<!-- Stores Start -->
	<div style="width:100%">
		<!-- Image -->
		<div class="store_top_image">
			<a href="#">
				<img class="image-responsive" src="{{ $store_image }}"/>
			</a>
		</div>
	</div>
	<div class="coupon_left">

		@foreach($products as $product)
				@include('partials.coupon-listing', ['product' => $product])
		@endforeach

		{{$products->links()}}
	</div>

<div class="store_right">
	<div class="subcription">
		<h2>Frooji Coupon Subscription</h2>
		<p>
			Email Adress<br>
			<input type="text" name="">
		</p>
		<p>
			First Name<br>
			<input type="text" name="">
		</p>
		<p>
			<button type="submit">SUBMIT</button>
		</p>
	</div>
</div>
<!-- Stores End -->
@endsection