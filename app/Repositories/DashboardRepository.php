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
	public function getCategories($limit=null, $request = null)
	{
		$builder = Category::with(['products' => function($query) use($request) {
									$query->where('coupon_code', '!=', '');
							    }])
							  ->whereActive()
							  ->whereFeatured()
		                      ->limit(3);
		
		if($request && $request->has('s')) {
			$builder = $builder->where('slug', $request->get('s'));
		}

		if($limit) {
			$builder = $builder->limit($limit);
		}

		return $builder->get();
	}

	/**
	 * Get stores with its related products
	 *
	 * @access public
	 * @return Collections
	 */
	public function getStores($limit=null, $store=null)
	{
		$builder = Merchant::with(['products'])
							 ->whereActive();
			                 //->limit(12);
			                 //->get();
        if($store) {
        	$builder = $builder->where('slug', $store);
        }

        if($limit) {
			$builder = $builder->limit($limit);
		}
				
		return $builder->get();
	}

	/**
	 * Get stores with its related products
	 *
	 * @access public
	 * @return Collections
	 */
	public function getStoreBySlug($slug)
	{
		$store =  Merchant::with(['products'])
							->where('slug', $slug)
							->whereActive()
			                ->first();
				
		return $store;
	}
}