@extends('admin.layouts.app')

@section('content')

<div class="full-page-wrapper ng-scope" ng-app="TevaCNS">
	<div class="col-lg-12 flash-container" style="margin-top: 35px;">
		<!-- ngRepeat: m in messages -->
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Manage Products
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

	<!-- Start table listing -->
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li>
					<a href="products">Home</a> 
				</li>
				<li class="active">
					Manage Products
				</li>
			</ol>
			<!-- /.panel-heading -->
			<!-- Start Search -->
				<div style="margin-bottom:20px;float:right" class="col-sm-10">
					<div class="col-sm-1"></div>
					<div class="col-sm-3 rm-padding-right ">
       					<div class="input-group">
          					<span class="input-group-addon" id="basic-addon1">
            					<i class="fa fa-search"></i>
         					</span>
            				<input class="search-input form-control ng-pristine ng-untouched ng-valid" placeholder="Name" aria-describedby="basic-addon1" style="width:100%; padding-left:10px;" name="name" type="text">                            </div> 
    					</div>
    					<div class="col-sm-3">
       					<select class="form-control" name="role_id">
       						<option value="" selected="selected">-- Select Store --</option>
       						
       					</select>
       				</div> 

    				<div class="col-sm-3">
       					<select class="form-control" name="status">
       						<option value="" selected="selected">-- Select Category --</option>
       						
       					</select> 
       				</div>
       				<div class="col-sm-1">
    					<button href="" class="search-filter btn btn-primary">
            				Search
            			</button>
            		</div>
            		<div class="col-sm-1">
    					<a href="products" class=" btn btn-primary">
            				Reset
            			</a>
            		</div>
               	</div>
			<!-- End Search -->

			<div class="panel-body">
				<div class="row table-listing-row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-sm-12">
								<form>

								</form>
								<div class="table-listing-wrapper">
									<table class="item-table table table-striped table-bordered table-hover border-left-zero assessment-table" data-key="user">
										<thead>
											<tr>
												<th style="width: 3%" class="multiple-select-checkbox-container">
													<input name="bulk_action" type="checkbox" value="1">
												</th>
												<th style="width: 7%" class="text-center">
													<a href="#">ID </a>
												</th>
												<th style="width: 35%" class="text-center">
													<a href="#">Name </a>
												</th>
												<th style="width: 20%" class="text-center">
													<a href="#">Store Name</a>
												</th>
												<th style="width: 11%" class="text-center">
													<a href="#">Expiry Date</a>
												</th>
												<th style="width: 7%" class="text-center">
													<a href="#">Featured</a>
												</th>
												<th style="width: 7%" class="text-center">
													<a href="#">Status</a>
												</th>
												<th style="width: 10%" class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($products as $key => $product)
											<tr class="odd gradeX">
												<td class="multiple-select-checkbox-container">
													<input name="bulk_action" type="checkbox" value="1">
												</td>
												<td class="text-center">{{$product->id}}</td>
												<td class="">{{$product->name}}</td>
												<td class="text-center">{{$product->merchant->name}}</td>
												<td class="text-center">
													{{$product->present()->getExpiryDate}}
												</td>
												<td class="text-center">
													<a href="products/featured/{{$product->id}}?featured={{!$product->featured}}" onclick="return confirm('Are you sure?')">
														{!! $product->present()->featuredIcon !!}
													</a>
												</td>
												<td class="text-center">
													<a href="products/status/{{$product->id}}?status={{!$product->status}}" onclick="return confirm('Are you sure?')">
														{!! $product->present()->statusIcon !!}
													</a>
												</td>
												<td class="text-center">
				 									<a href="products/{{$product->id}}" onclick="return confirm('Are you sure?')">
														<i class="fa fa-trash"></i>
													</a>
				 								</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page_numbers">
					{{ $products->links() }}
				</div>
			</div>
			<!-- end Panel -->
		</div>
	</div>                            
</div>
@endsection							