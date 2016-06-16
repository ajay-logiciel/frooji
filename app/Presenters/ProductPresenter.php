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
		$id = $this->entity->id;
		$direct_url = $this->entity->direct_url;
		if(empty($this->entity->coupon_code)) {
			
			$class="get-deal-link";
			$text="GET DEALS";

			$link = "<a href='".$direct_url."' data-id='".$id."' class='".$class."' target='_blank'>$text</a>";
		} else {
			$class="use-coupon-link";
			$text="USE COUPON";
			
			$link = "<a href='".route('get.usecoupon.popup', ['id' => $id])."' class='".$class."' data-toggle='modal' data-target='#mediumPopup'>$text</a>";
		}

		return $link;
	}
}