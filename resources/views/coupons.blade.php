@extends('layouts.master')

@section('content')

<!-- Stores Start -->
<div style="width:100%">
	<!-- Image -->
	<div class="store_top_image">
		<a href="#">
			<img class="image-responsive" src="{{$store->getImage()}}"/>
		</a>
	</div>
	<!-- Heading -->
	<!-- <h3 style="text-align:center;width:76%;text-align:center;float:left;padding-top:30px;">
		<img class="image-responsive" src="{{$store->getImage()}}"/>
	</h3> -->
</div>
<div class="coupon_left">

	@foreach($store->products as $product)
		@include('partials.coupon-listing', ['product' => $product, 'catOrMerchant' => $store])
	@endforeach

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