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
            <th style="text-align:center" class="table_heading">Id</th>
            <th style="text-align:center" class="table_heading">Name</th>
            <th style="text-align:center" class="table_heading">Store Name</th>
    		<th style="text-align:center" class="table_heading">Expiry Date</th>
            <th style="text-align:center" class="table_heading">Featured</th>
            <th style="text-align:center" class="table_heading">Status</th>
    		<th style="text-align:center" class="table_heading">Actions</th>
    	</tr>
    	 @foreach($products as $key => $product)
    	<tr>
            <td style="text-align:center">{{$product->id}}</td>
            <td style="text-align:center">{{$product->name}}</td>
            <td style="text-align:center">{{$product->store->name}}</td>
    		<td style="text-align:center">
            @if($product->end_date)
                {{ date('d/m/y', strtotime($product->end_date)) }}
            @endif
            </td>
            <td style="text-align:center">
                {!! link_to_route('coupon_settings_featured', $product->featured, ['id'=>$product->id,'featured'=> !$product->featured], $attributes = array()) !!}
            </td>
            <td style="text-align:center">
                {!! link_to_route('coupon_settings_status', $product->status, ['id'=>$product->id,'status'=> !$product->status], $attributes = array()) !!}
            </td>
            <td style="text-align:center">
                 {!! link_to_route('coupon_settings_delete', 'Delete', ['id'=>$product->id]) !!}
            </td>
    	</tr>
    	@endforeach
    </table>
    <div class="page_numbers">
   		{{ $products->links() }}
    </div>
</div>
@endsection
