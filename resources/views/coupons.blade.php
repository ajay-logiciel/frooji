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

		<div class="coupon">
			<p class="company_name col-sm-12">
				<a href="{{ route('store.coupons', [$store->slug]) }}">
					{{ $store->name }}
				</a>
			</p>
			<div class="store_holder col-sm-2">
				<a href="">
					<!-- <img src="http://frooji.com/wp-content/uploads/2016/05/18736.gif"> -->
					<img src="{{ $product->getCouponImage() }}">

				<div class="frooji_label">
					25% off
					<br>Code
				</div>
			</div>

			<div class="coupon_title col-sm-10">
				<h3>
					<a href="">
						{!! $product->name !!}
					</a>
				</h3>
			</div>

			<div class="use_coupon">
				<a href="">
					USE COUPON
				</a>
			</div>
			<span class="deal_exp">Exp: 09/29/2016
				<a href="" class="deal_star">
					<img src="http://frooji.com/wp-content/plugins/wp-favorite-posts/img/fav-empty.png"/>
				</a>
			</span>	

			<!-- <span class="coupon_views">4 total views, 1 today</span> -->
			<div class="coupon_footer">
				<div class="thumb_up">
					<a href=""><div></div></a>
				</div>
				<div class="thumb_down">
					<a href=""><div></div></a>
				</div>
				<div class="success">
					<span>100%</span>
					<br>success
				</div>

				<!-- <div class="comment">
					comment
				</div> -->
			</div>

			<!-- <div class="add_comment">
				<a href="">Add Comment</a>
			</div> -->
		</div>

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