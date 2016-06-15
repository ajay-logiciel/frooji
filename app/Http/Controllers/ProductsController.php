<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\ProductRepository;
use App\Repositories\DashboardRepository;
use View;

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

    public function getDashboardContents()
    {
        $categories = $this->dasboardRepo->getCategories();
        $merchants  = $this->dasboardRepo->getMerchants();

        return View::make('home', 
            [
                'categories' => $categories,
                'merchants'  => $merchants
            ]);
    }
}
