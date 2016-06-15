@extends('layouts.master')

@section('content')
<!-- Top Categories Start-->
<div class="top_cat">
	<h2>Top Coupon Categories</h2>
	<div class="cats">
		<?php 
			$count = 0;
			$cat_images = \Config::get('frooji.category_images');
		?>
		@foreach($categories as $category)
			<a href="{{ route('get.dashboard', ['s' => $category->slug]) }}" class="col-md-4">
				<img class="image-responsive" src="{{$category->getImage()}}">
				<div>{{ $category->name }}</div>
			</a>
		@endforeach
	</div>
</div>
<!-- Top Categories End-->

<!-- Top Stores Start-->
<div class="top_stores">
	<h2>Top Stores</h2>
	@foreach($stores as $store)
		<div class="stores">
			<a href="{{ route('store.coupons', [$store->slug]) }}" class="col-md-3">
				<img class="image-responsive" src="{{$store->getImage()}}"/>
				<br>
				<span>{{ $store->products->count() }}</span>
			</a>
		</div>
	@endforeach
</div>
<!-- Top Stores End-->

<!-- Featured Deals Start-->
<div class="featured_deals">
	<h2>Featured Deals</h2>
	<?php for($i = 1; $i <= 2; $i++){ ?>
	<div class="col-md-4">
		<div class="f_deal">
			<div class="deal_top">
				<a href="/" class="best_buy">Best Buy</a>
				<a href="" class="deal_star">
					<img src="http://frooji.com/wp-content/plugins/wp-favorite-posts/img/fav-empty.png"/>
				</a>
			</div>
			<div class="deal_img">
				<img src="http://frooji.com/wp-content/uploads/2016/05/bestbuy-160x120.png">
			</div>
			<div class="deal_text">
				<a href="/">
					GoPro HERO4 Session HD Waterproof  Camera Now: $299.99 + Free Shipping
				</a>
			</div>
			<div class="get_deal">
				<a href="">
					GET DEAL
				</a>
			</div>
			<span class="deal_exp">Exp: 09/29/2016</span>
		</div>
	</div>
	<?php } ?>
	<div class="col-md-4">
		<div class="f_deal">
			<div class="deal_top">
				<a href="/" class="best_buy">Best Buy</a>
				<a href="" class="deal_star">
					<img src="http://frooji.com/wp-content/plugins/wp-favorite-posts/img/fav-empty.png"/>
				</a>
			</div>
			<div class="deal_img">
				<img src="http://frooji.com/wp-content/uploads/2016/05/11458421.gif">
			</div>
			<div class="deal_text">
				<a href="/">
					$5 off $50+ order
				</a>
			</div>
			<div class="get_deal">
				<a href="">
					GET DEAL
				</a>
			</div>
			<span class="deal_exp">Exp: 09/29/2016</span>
		</div>
	</div>
</div>
<!-- Featured Deals End-->

@endsection