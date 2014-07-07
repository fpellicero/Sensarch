<?php 
	/*
	 * 
	 */
	class Category extends Eloquent
	{
		protected $table = 'categories';

		function projects()
		{
			return $this->belongsToMany('Project');
		}

	}
	?>