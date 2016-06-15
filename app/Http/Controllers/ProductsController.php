<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProductRepository;
use App\Repositories\DashboardRepository;
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
        $cat_limit = Config::get('frooji.dashboard.category_limit');
        $store_limit = Config::get('frooji.dashboard.store_limit');;

        if($request->has('s')) {
            $categories = $this->dasboardRepo->getCategories($cat_limit, $request);
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
     * Get Store's coupon contents
     *
     * @access public
     * @param category:string
     * @return View
     */
    public function getStoreCoupon($store)
    {
        $stores = $this->dasboardRepo->getCategories($store);
        return view('coupons');
    }
}
