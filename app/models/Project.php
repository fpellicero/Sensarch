<?php 
	/**
	* 
	*/
	class Project extends Eloquent
	{
		protected $table = 'projects';

		function images()
		{
			return $this->hasMany('Image', 'project_id');
		}

		function homeImage()
		{
			return Image::find($this->home_image);
		}

	}
	?>