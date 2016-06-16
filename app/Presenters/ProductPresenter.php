<?php 

namespace App\Presenters;

use App\Core\DateFormat;
use Caffeinated\Presenter\Presenter;
use Carbon\Carbon;

class ProductPresenter extends Presenter
{

	public function name()
	{
		return $this->entity->name;
	}
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
		} else {
			$class="use-coupon-link";
			$text="USE COUPON";	
		}
		
		$link = "<a href='".route('get.usecoupon.popup', ['id' => $id])."' class='".$class."' data-toggle='modal' data-target='#mediumPopup'>$text</a>";

		return $link;
	}

	/**
	 * Get expiry date.
	 */
	public function expiryDate()
	{
		if(!$this->entity->endDate) {
			return;
		}

		$time = strtotime($this->entity->endDate);
		$myFormatForView = date("m/d/Y", $time);
		return 'Exp:&nbsp;'. $myFormatForView;
	}

	/**
	 * Get Discount. 
	 */
	public function discount()
	{
		// Need to covert float into proper %.
		$per = (int)$this->entity->precentage;
		if(!$per) {
			return 'Free Offer <br/>Coupon';
		}

		return $per ."% Off Code";
	}

	public function store()
	{
		dd($this->merchant);
	}
}