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

		

		function getCoverImgURL()
		{
			if ($this->img_home) {
				$img = Image::find($this->img_home);
				return '/sensarch/public/uploads/' . $img->filename;
			}else {
				return 'http://upload.wikimedia.org/wikipedia/commons/6/6f/Disney_Concert_Hall_by_Carol_Highsmith.jpg';
			}
			
		}

	}
	?>