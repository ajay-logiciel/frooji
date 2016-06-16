<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductsController extends Controller
{
    protected $repository;

    /**
     *  return Products (Coupons) 
     * @access public
     * @return view
     */
    public function index()
    {
        $limit = \Config::get('globalconfig.admin.products_limit');
        $products = Products::select('id' ,'merchant_id', 'name' , 'end_date', 'featured', 'status')
                            ->orderby('created_at', 'desc')
                            ->with(['store'])
                            ->paginate($limit);
        return view('admin.coupon_settings', ['products' => $products]);
    }

    /**
     * Change Product (Coupon) featured
     *
     * @access public
     * @param id:int | featured:boolean
     * @return 
     */
    public function featured($id, Request $request)
    {
        $featured = (bool)$request->input('featured');

        $product = Products::findOrFail($id);
        $product->featured = $featured;
        $product->save();
        
        return redirect()->back();
    }

    /**
     * Delete Product (Coupon)
     *
     * @access public
     * @param id:int
     * @return 
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        
        return redirect()->back();
    }

    /**
     * Change Product (Coupon) status
     *
     * @access public
     * @param id:int | status:boolean
     * @return 
     */
    public function status($id, Request $request)
    {
        $status = (bool)$request->input('status');
        
        $product = Products::findOrFail($id);
        $product->status = $status;
        $product->save();
        
        return redirect()->back();
    }
}
