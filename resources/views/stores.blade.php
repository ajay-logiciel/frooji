@extends('layouts.master')

@section('content')
<?php $array = ['#','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'] ?>
<!-- Stores Start -->
	<div id="store_wrap">
		<div class="store_left">
			<h3 style="text-align:center"><b>Browse by Store</b></h3>
			<div class="store_index">
				@foreach($array as $a)
					<a href="#{{$a}}">{{$a}}</a>
				@endforeach
			</div>
			<div class="store_name_wrap">
			@foreach($array as $a)
				<div class="store_name_index" id="{{$a}}">{{$a}}</div>
				<div class="store_name">
				<ul>
				<?php for($i = 1; $i <= 10; $i++) {?>
					<li>
						<a>Geh sdf sdgf fgs</a>
					</li>
					<li>
						<a>jhykw mGeh sdf sdgf fgs</a>
					</li>
				<?php } ?>
				</ul>
				</div>
			@endforeach
			</div>
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
	</div>
<!-- Stores End -->
@endsection