@extends('layouts.master')

@section('content')
<!-- Top Categories Start-->
<div class="top_cat">
	<h2>{{ trans('common.dashboard.top_coupon_categories') }}</h2>
	<div class="cats">
		<?php 
			$count = 0;
			$cat_images = \Config::get('globalconfig.category_images');
		?>
		@foreach($categories as $category)
			<a href="{{ route('get.product.coupons', ['s' => $category->slug]) }}" class="col-md-4">
				<img class="image-responsive" src="{{$category->getImage()}}">
				<div>{{ $category->name }}</div>
			</a>
		@endforeach
	</div>
</div>
<!-- Top Categories End-->

<!-- Top Stores Start-->
<div class="top_stores">
	<h2>{{ trans('common.dashboard.top_stores') }}</h2>
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
	<h2>{{ trans('common.dashboard.featured_deals') }}</h2>
	@foreach($featured_products as $fProduct)
		<div class="col-md-4">
			<div class="f_deal">
				<div class="deal_top">
					<a href="{{ route('store.coupons', [$fProduct->merchant->slug]) }}" class="best_buy">
						{{ $fProduct->merchant->name }}
					</a>
					<a href="" class="deal_star">
						<img src="http://frooji.com/wp-content/plugins/wp-favorite-posts/img/fav-empty.png"/>
					</a>
				</div>
				<div class="deal_img">
					<img src="{{ $fProduct->getCouponImage() }}" width="125px;">
				</div>
				<div class="deal_text">
					{{$fProduct->present()->name}}
				</div>
				<div class="get_deal">
					{!! $fProduct->present()->coupon !!}
				</div>
				<span class="deal_exp">{{$fProduct->expiryDate}}</span>
			</div>
		</div>
	@endforeach
</div>
<!-- Featured Deals End-->

@endsection