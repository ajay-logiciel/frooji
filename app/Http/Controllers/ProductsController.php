<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProductRepository;
use App\Repositories\DashboardRepository;
use App\Models\Product;
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
        $store_limit = Config::get('globalconfig.dashboard.store_limit');


        if($request->has('s')) {
            $category = $this->dasboardRepo->getCategories($cat_limit, $request);

            return View::make('search', 
            [
                'store' => $category->first(),
            ]);

        }

        $categories = $this->dasboardRepo->getCategories($cat_limit);
        $stores  = $this->dasboardRepo->getStores($store_limit);
        $featured_products  = $this->dasboardRepo->getFeaturedProducts();

        return View::make('home', 
            [
                'categories' => $categories,
                'stores'     => $stores,
                'featured_products' => $featured_products
            ]);
    }

    /**
     * Get Store and its all coupons using store's slug.
     *
     * @access public
     * @param category:string
     * @return View
     */
    public function getProductsByStoreSlug($slug)
    {
        $products = $this->dasboardRepo->getAllProductOfSlug($slug);
        $firstProduct = $products->first(); 
        $store_image = $firstProduct->getStoreImage();

        return View::make('coupons', [
            'products' => $products,
            'store_image' => $store_image
        ]);
    }

    /**
     * Get all products of related categories.
     *
     * @access public
     * @param Illuminate\Http\Request;
     * @return View
     */
    public function getProductsByCategorySlug(Request $request)
    {
        if(!$request->has('s')) {
            return Redirect::route('get.dashboard');
        }

        $slug = $request->get('s');
        $products = $this->dasboardRepo->getAllProductsOfCategory($slug);

        return View::make('search', [
                'products' => $products
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
