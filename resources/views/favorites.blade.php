@extends('layouts.master')

@section('content')
<?php $array = ['#','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'] ?>
<!-- Stores Start -->
	<div id="store_wrap">
		<div class="store_left">
			<h3 style="text-align:center"><b>Favorites</b></h3>
			<div class="no_favorites">
				Your favorite list is currently empty. To mark a favorite coupon, click on the star icon. Your favorites will be temporarily saved if you are not logged in. To save permanently, please register and login
			</div>
			<a href="" class="clear_favorites_btn">
				Clear Favorites
			</a>
			<div>
				Your favorite posts are only saved to your browser cookies if you are not logged in.
			</div>
		</div>
		<div class="store_right">
			<div class="subcription">
				<h2>Coupon Type</h2>
				<div class="subcription_padding">
					
				</div>
			</div>
			<div class="subcription">
				<h2>Coupon Category</h2>
				<div class="subcription_padding">
					
				</div>
			</div>
			<div class="subcription">
				<h2>Store</h2>
				<div class="subcription_padding">
					
				</div>
			</div>
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
	</div>
<!-- Stores End -->
@endsection