<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\AppController;
use App\Models\Products;

class ProductsController extends AppController
{
    protected $repository;

    /**
    * Dispaly all products (Coupons)
    */
    public function index()
    {
        $products = Products::orderby('created_at', 'desc')->paginate(5);

        return view('admin.coupon_settings', ['products' => $products]);
    }

    /**
    * set / unset featured products (Coupons)
    */
    public function featured($id, Request $request)
    {
        $isFeatured = (bool)$request->input('is_featured');
        if(!$isFeatured) {
            $isFeatured = false;
        }
        $product = Products::findOrFail($id);
        $product->is_featured = $isFeatured;
        $product->save();
        
        return redirect()->back();
    }
}
