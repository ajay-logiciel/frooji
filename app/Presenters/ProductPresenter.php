<?php 

namespace App\Presenters;

use App\Core\DateFormat;
use Caffeinated\Presenter\Presenter;
use Carbon\Carbon;

class ProductPresenter extends Presenter
{

	/**
	 *  show label of correct type i.e. confirmative or informative.
	 * 
	 *  @return string
	 */
	public function coupon()
	{
		$class="use-coupon-link";
		$text="USE COUPON";
		if(empty($this->entity->coupon_code)) {
			
			$class="get-deal-link";
			$text="GET DEALS";
		} 

		$link = "<a href='".$this->entity->direct_url."' data-id='".$this->entity->id."' class='".$class."' target='_blank'>$text</a>";

		return $link;
	}
}