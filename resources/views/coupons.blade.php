@extends('layouts.master')

@section('content')
<?php $array = ['#','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'] ?>
<!-- Stores Start -->
<div style="width:100%">
	<h3 style="text-align:center;width:76%;text-align:center;float:left;padding-top:30px;">
		<b>Coupons in the "Apparel" Category</b>
	</h3>
</div>
<div class="coupon_left">

	<?php for($i = 1; $i <= 1 ; $i++) { ?>
	<div class="coupon">
		<p class="company_name">
			<a href="">CuddlDuds</a>
		</p>
		<div class="store_holder">
			<a href="">
				<img src="http://frooji.com/wp-content/uploads/2016/05/18736.gif">
			</a>
			<div class="frooji_label">
				25% off
				<br>Code
			</div>
		</div>
		<div class="coupon_title">
			<h3>
				<a href="">
					25% off Men's Layers Plus Free Shipping
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
		<span class="coupon_views">4 total views, 1 today</span>
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
			<div class="comment">
				comment
			</div>
		</div>
		<div class="add_comment">
			<a href="">Add Comment</a>
		</div>
	</div>
	<?php } ?>

	<!-- <div id="comment_wrap">
		<h1>Comment</h1>
		<div class="comment_form">
			<h3>Post a Comment</h3>
			<form>
				<p>
					Name:<br>
					<input type="text" name="">
				</p>
				<p>
					Email:<br>
					<input type="email" name="">
				</p>
				<p>
					Website:<br>
					<input type="text" name="">
				</p>
				<p>
					<input type="textarea" name="">
				</p>
				<p>
					<input type="submit" name="">
				</p>

			</form>
		</div>
	</div> -->
</div>
<div class="store_right">
	<div class="subcription">
		<h2>Frooji Coupon Subscription</h2>
		<div>
			Email Adress<br>
			<input type="text" name="">
		</div>
		<div>
			First Name<br>
			<input type="text" name="">
		</div>
		<div>
		</div>
		<div>
			<button type="submit">SUBMIT</button>
		</div>
	</div>
</div>
<!-- Stores End -->
@endsection