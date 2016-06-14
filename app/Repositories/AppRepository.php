<?php

namespace App\Repositories;

class AppRepository
{
	/**
	 * Get status value
	 *
	 * @access public
	 * @param status:string
	 * @return status:boolean
	 */
	public function getStatus($status)
	{
		$flag = false;
		if($status == "active") {
			$flag = true;
		}

		return $flag;
	}

	/**
	 * 	sync tags to any single node.
	 * 	
	 *  @param  $node: model object.
	 *  @param  $tag_ids: array list of tag ids.
	 *  @return boolean
	 */
	public function syncTags($node, $tag_ids = array())
	{
		if(!$tag_ids) {
			return;
			/*$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 400);*/
		}

		$tag_ids = array_unique($tag_ids);
		$node->tags()->detach($tag_ids);
		$node->tags()->sync($tag_ids);

		/*if(!$node->tags()->sync($tag_ids)) {
			$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 500);
		}*/
		return true;
	}

	/**
	 * 	detach tag to any single node.
	 * 	
	 *  @param  $node: model object.
	 *  @param  $tag_id: integer of tag id.
	 *  @return boolean
	 */
	public function detachTag($node, $tag_id)
	{
		if(!$tag_id) {
			return;
			/*$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 400);*/
		}

		if(!$node->tags()->detach($tag_id)) {
			$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 500);
		}
		return true;
	}

	/**
	 * 	sync tags to any single node.
	 * 	
	 *  @param  $node: model object.
	 *  @param  $tag_ids: array list of tag ids.
	 *  @return boolean
	 */
	public function syncCategory($node, $cat_ids = array())
	{
		if(!$cat_ids) {
			return;
			/*$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 400);*/
		}

		$cat_ids = array_unique($cat_ids);
		$node->categories()->detach($cat_ids);
		$node->categories()->sync($cat_ids);

		/*if(!$node->categories()->sync($tag_ids)) {
			$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 500);
		}*/
		return true;
	}

	/**
	 * 	detach tag to any single node.
	 * 	
	 *  @param  $node: model object.
	 *  @param  $tag_id: integer of tag id.
	 *  @return boolean
	 */
	public function detachCategory($node, $cat_id)
	{
		if(!$cat_id) {
			return;
			/*$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 400);*/
		}

		if(!$node->categories()->detach($cat_id)) {
			$message = trans('flash_messages.please_select_atleast_one_tag');
			throw new Exception($message, 500);
		}
		return true;
	}
}