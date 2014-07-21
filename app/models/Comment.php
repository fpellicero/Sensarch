<?php 
	/*
	 * 
	 */
	class Comment extends Eloquent
	{
		protected $table = 'comments';

		function author()
		{
			return $this->belongsTo('User', 'user_id');
		}
	}
	?>