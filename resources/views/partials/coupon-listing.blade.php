<div class="coupon">
	<p class="company_name col-sm-12">
		<a href="{{ route('store.coupons', [$product->slug]) }}">
			{{ $product->name }}
		</a>
	</p>
	<div class="store_holder col-sm-2">
		<a href="">
			<!-- <img src="http://frooji.com/wp-content/uploads/2016/05/18736.gif"> -->
			<img src="{{ $product->getCouponImage() }}">

		<div class="frooji_label">
			{!! $product->present()->discount !!}
		</div>
	</div>

	<div class="coupon_title col-sm-10">
		<h3>
			<a>
				{!! $product->present()->name !!}
			</a>
		</h3>
	</div>

	<div class="use_coupon">
		{!! $product->present()->coupon !!}
	</div>
	<span class="deal_exp">
		{!! $product->present()->expiryDate !!}	
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
	