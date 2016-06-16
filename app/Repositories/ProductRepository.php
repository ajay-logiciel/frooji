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

class ProductRepository extends AppRepository
{
    
    public function __construct(Deals $deals)
    {
        $this->deals = $deals;
    }

    /**
     * Get and save deals
     */
    public function getAndSaveDeals()
    {
        $deals = $this->deals->getDeals();
        $this->saveDeals($deals);
    }

    /**
     * Save Deals.
     *
     * @access public
     * @param product:array
     * @return void
     */
    public function saveDeals($data)
    {
        foreach ($data as $k => $product) {
            $this->saveProductAndOtherInfo($product);
        }
    }

    /**
     * Save product and some other information.
     *
     * @access private
     * @param product:array
     * @return void
     */
    private function saveProductAndOtherInfo($product)
    {
        DB::beginTransaction();
        try {
            
            $merchant = $this->saveMerchant($product);
            $this->saveCategories($product);
            $this->saveTags($product);
            $savedProduct = $this->saveProduct($product, $merchant);
            $this->assignTags($savedProduct, $product);
            $this->assigncategories($savedProduct, $product);
            $this->saveProductMeta($savedProduct, $product);
        } catch (Exception $e) {
            
            DB::rollBack();
        }

        DB::commit();
    }

    /**
     * Save product meta
     *
     * @access private
     * @param savedProduct:Collection
     * @param product:array
     * @return void
     */
    public function saveProductMeta($savedProduct, $product)
    {
    	$metaObj = ProductMeta::where('product_id', $savedProduct->id)->first();
    	if(!$metaObj) {
    		$metaObj = new ProductMeta;
    	}
    	
    	$metaObj->product_id = $savedProduct->id;
    	$metaObj->item_key = Product::FEED;
    	$metaObj->value = $product;
    	$metaObj->save();
    }

    /**
     * Assign tags to product
     *
     * @access private
     * @param savedProduct:Collection
     * @param product:array
     * @return void
     */
    private function assignTags($savedProduct, $product)
    {
        $tags = $product['aTypes'];
        $tagLists = Tag::whereIn('slug', $tags)->lists('id')->all();
        $this->syncTags($savedProduct, $tagLists);
    }

    /**
     * Assign categories to product
     *
     * @access private
     * @param product
     * @return void
     */
    private function assigncategories($savedProduct, $product)
    {
        $categories = $product['aCategories'];
        $catLists = Category::whereIn('slug', $categories)->lists('id')->all();
        $this->syncCategory($savedProduct, $catLists);
    }

    /**
     * Save all categories of Product
     *
     * @access private
     * @param product:array
     * @return void
     */
    private function saveCategories($product)
    {
        $categories = $product['aCategories'];
        foreach ($categories as $k => $category) {
            $category = trim($category);
            $hasCat = Category::where('slug', $category)->first();
            if (!$hasCat) {
                $categoryObj = new Category;
                $categoryObj->name = $category;
                $categoryObj->slug = $category;
                $categoryObj->status = $this->getStatus($product['cStatus']);
                $categoryObj->save();
            }
        }
    }

    /**
     * Save Merchant's info of product.
     *
     * @access private
     * @param merchant:array
     * @return merchant:Collection
     */
    private function saveMerchant($product)
    {
        $merName = trim($product['cMerchant']);
        $hasMerchant = Merchant::where('name', $merName)->first();
        if (!$hasMerchant) {
            $merchantObj = new Merchant;
            $merchantObj->name = $merName;
            $merchantObj->merchant_id = $product['nMerchantID'];
            $merchantObj->save();
            
            return $merchantObj;
        }

        return $hasMerchant;
    }

    /**
     * Save Product.
     *
     * @access private
     * @param product:array
     * @return product:Collection
     */
    private function saveProduct($product, $merchant)
    {
        $productObj = new Product;
        $productObj->name = trim($product['cLabel']);
        $productObj->merchant_id = $merchant->id;
        $productObj->link_id = $product['nLinkID'];
        $productObj->image = $product['cImage'];
        $productObj->coupon_id = $product['nCouponID'];
        $productObj->coupon_code = $product['cCode'];
        $productObj->network = $product['cNetwork'];
        $productObj->affiliate_url = $product['cAffiliateURL'];
        $productObj->direct_url = $product['cDirectURL'];
        $productObj->skim_link_url = $product['cSkimlinksURL'];
        $productObj->fmtc_url = $product['cFMTCURL'];
        $productObj->sale_price = $product['fSalePrice'];
        $productObj->old_price = $product['fWasPrice'];
        $productObj->discount = $product['fDiscount'];
        $productObj->precentage = $product['nPercent'];
        $productObj->threshold = $product['fThreshold'];
        $productObj->rating = $product['fRating'];
        $productObj->start_date = $product['dtStartDate'];
        $productObj->end_date = $product['dtEndDate'];
        $productObj->last_update = $product['cLastUpdated'];
        $productObj->last_created = $product['cCreated'];
        $productObj->save();

        return $productObj;
    }

    /**
     * Save Tags.
     *
     * @access private
     * @param product:array
     * @return void
     */
    private function saveTags($product)
    {
        $tags = $product['aTypes'];
        foreach ($tags as $k => $tag) {
            $tag = trim($tag);
            $hasTag = Tag::where('slug', trim($tag))->first();
            if (!$hasTag) {
                $tagObj = new Tag;
                $tagObj->name = $tag;
                $tagObj->slug = $tag;
                $tagObj->save();
            }
        }
    }
}
