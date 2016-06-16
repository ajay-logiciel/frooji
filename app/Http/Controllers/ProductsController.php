<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProductRepository;
use App\Repositories\DashboardRepository;
use App\Product;
use View, Config;

class ProductsController extends Controller
{
    protected $repository;
    protected $dasboardRepo;

    public function __construct(ProductRepository $repository,DashboardRepository $dasboardRepo)
    {
        $this->repository = $repository;
        $this->dasboardRepo = $dasboardRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDeals()
    {
        $deals = $this->repository->getAndSaveDeals();
    }

    /**
     * Get dashboard contents
     *
     * @access public
     * @param Illuminate\Http\Request
     * @return View
     */
    public function getDashboardContents(Request $request)
    {
        $cat_limit = Config::get('globalconfig.dashboard.category_limit');
        $store_limit = Config::get('globalconfig.dashboard.store_limit');;

        if($request->has('s')) {
            $category = $this->dasboardRepo->getCategories($cat_limit, $request);

            return View::make('search', 
            [
                'store' => $category->first(),
            ]);

        }

        $categories = $this->dasboardRepo->getCategories($cat_limit);
        $stores  = $this->dasboardRepo->getStores($store_limit);

        return View::make('home', 
            [
                'categories' => $categories,
                'stores'     => $stores
            ]);
    }

    /**
     * Get Store and its all coupons using store's slug.
     *
     * @access public
     * @param category:string
     * @return View
     */
    public function getStoreBySlug($slug)
    {
        $store = $this->dasboardRepo->getStoreBySlug($slug);

        return View::make('coupons', [
            'store' => $store
        ]);
    }

    public function searchByCategory(Request $request)
    {
        if(!$request->has('s')) {
            return Redirect::route('get.dashboard');
        }

        $slug = $request->get('s');
        $category = $this->dasboardRepo->getCategoryBySlug($slug);

        return View::make('search', [
                'category' => $category
            ]);
    }

    /**
     * Get use coupon code popup
     *
     * @access public
     * @param id:int
     * @return View
     */
    public function getCouponPopup($id)
    {
        $product = Product::findOrFail($id);

        return View::make('coupon-popup', [
                'product'   => $product
            ]);
    }
}
