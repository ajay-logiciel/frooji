
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">
        {{ trans('common.product_search.coupon_popup.use_coupon_popup_heading') }}
    </h4>
</div>
<div class="modal-body">        
    <!-- Start table listing -->
    <div class="row">
        <div class="col-lg-12">

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    	<div class="coupon-box-wrapper">
	                        <div class="row">
	                            
                                <input 
                                	type="text" 
                                	name="coupon" 
                                	readonly="readonly" 
                                	value="{{$product->coupon_code}}"
                                	class="form-control coupon-input"/>
	                            
	                        </div>
	                        <div class="continue-store-box">
	                        	<div class="row">
	                        		<p class="text-center">
	                        			@if(empty($product->coupon_code))
	                        				{{ trans('common.product_search.coupon_popup.no_coupon_code_required') }}
	                        			@else
	                        				{{ trans('common.product_search.coupon_popup.please_copy_and_paste') }}
	                        			@endif
	                        			<br/>
	                        			<a href="{{$product->direct_url}}" class="text-center continue-store-link btn btn-primary" target="_blank">
	                        				{{ trans('common.product_search.coupon_popup.continue_to_store') }}
	                        			</a>
	                        		</p>
	                        	</div>
	                        </div>
	                    </div>	                        
                    </div>
                </div>
            </div>                            
        </div>
    </div>   
   
</div>
<div class="modal-footer">
    <div class="coupon_footer" style="margin-top:0px;">
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
	</div>
</div>
<div class="loader-container" style="display:block;">
    
</div>