<?php 

namespace App\Repositories;

use App\Repositories\AppRepository;
use App\Product;
use App\Category;
use App\Merchant;
use App\Tag;
use App\ProductMeta;
use App\Http\Deals;
use DB;

class DashboardRepository extends AppRepository
{
	public function getCategories()
	{
		/*$categories = Category::with(['products' => function($query) {
									$query->where('')
							  }])*/
							 
		$categories = Category::whereActive()
							  ->whereFeatured()
		                      ->limit(3)
		                      ->get();

		return $categories;
	}

	public function getMerchants()
	{
		$merchants = Merchant::whereActive()
			                 ->limit(12)
			                 ->get();
		return $merchants;
	}
}