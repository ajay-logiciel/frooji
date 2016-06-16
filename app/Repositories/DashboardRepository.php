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
	/**
	 * Get all categories with product
	 *
	 * @access public
	 * @param 
	 * @return Collections
	 */
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
							 ->whereActive()
							 ->where('image', '!=', null);

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

	/**
	 * Get category(with products) by slug.
	 * 
	 * @access public
	 * @return Collections
	 */
	public function getCategoryBySlug($slug)
	{
		$category =  Category::with(['products'])
							->where('slug', $slug)
							->whereActive()
			                ->first();
	
		return $category;
	}

	/**
	 * Get featured products.
	 * 
	 * @access public
	 * @return Collections
	 */
	public function getFeaturedProducts()
	{
		$featured_product_limit = \Config::get('globalconfig.dashboard.feature_product_limit');
		$products = Product::whereFeatured()
						   ->limit($featured_product_limit)
						   ->orderBy('updated_at', 'DESC')
						   ->get();

		return $products;
	}
}