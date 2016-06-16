@extends('admin.dashboard')

@section('partial')

<style>
    .active2 {
        background: #f5f5f5;
    }
    .table_heading{
    	background: #e3e3e3;
    }
    .coupons_table{
    	width: 100%;
    	border: 1px solid #ddd;
    	padding-top:10px;
    }
    .coupons_table tr th{
    	padding: 10px;
    }
    .coupons_table tr td{
    	padding: 5px;
    }
    .page_numbers{
    	text-align: center;
    	width: 100%
    }

	
	.pagination>li>a,
	.pagination>li>span {
		float:none !important;
	}

</style>
<div class="col-xs-9">
    <table class="coupons_table" border="1">
    	<tr>
    		<th style="width:30%" class="table_heading">Date</th>
    		<th style="width:40%;text-align:center" class="table_heading">Coupon Name</th>
    		<th style="width:30%;text-align:center" class="table_heading">Featured</th>
    	</tr>
    	 @foreach($products as $key => $product)
    	 {!! Form::open([ 'method' => 'put', 'route' => ['coupon_settings_featured', $product->id ]]) !!}
    	<tr>
    		<td>{{ date('d/m/y', strtotime($product->start_date)) }}</td>
    		<td style="text-align:center">{{$product->name}}</td>
    		<td style="text-align:center">
    			{!! Form::checkbox('is_featured', 1, $product->is_featured, ['style' => 'zoom:1.3;cursor:pointer', 'onchange' => 'this.form.submit()']) !!}
    		</td>
    	</tr>
    	{!! Form::close() !!}
    	@endforeach
    </table>
    <div class="page_numbers">
   		{{ $products->links() }}
    </div>
</div>
@endsection
