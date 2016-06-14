<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductsController extends Controller
{
    protected $repository;

    /*public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderby('created_at', 'desc')->paginate(5);

        return view('admin.coupon_settings', ['products' => $products]);
    }

    public function featured($id, Request $request)
    {
        $is_featured = (bool)$request->input('is_featured');
        if(!$is_featured) {
            $is_featured = false;
        }
        $product = Products::findOrFail($id);
        $product->is_featured = $is_featured;
        $product->save();
        return redirect()->back();
    }
}
