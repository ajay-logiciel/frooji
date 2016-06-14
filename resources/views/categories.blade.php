@extends('layouts.master')

@section('content')
<?php $array = ['#','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'] ?>
<!-- Stores Start -->
	<div id="store_wrap">
		<div class="store_left">
			<h3 style="text-align:center"><b>Browse by Coupon Category</b></h3>
			<div class="store_index">
				@foreach($array as $a)
					<a href="#{{$a}}">{{$a}}</a>
				@endforeach
			</div>
			<div class="store_name_wrap">
			@foreach($array as $a)
				<div class="store_name_index" id="{{$a}}">{{$a}}</div>
				<div class="store_name category_name">
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
	</div>
<!-- Stores End -->
@endsection