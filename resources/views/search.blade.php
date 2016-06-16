@extends('layouts.master')

@section('content')

<!-- Stores Start -->
<div style="width:100%">
	<!-- Image -->
	<div class="" style="height:100px;"></div>
	
</div>
<div class="coupon_left">

	@foreach($category->products as $product)
		@include('partials.coupon-listing', ['product' => $product , 'catOrMerchant' => $category])
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