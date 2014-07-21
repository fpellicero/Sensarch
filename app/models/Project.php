<?php 
	/*
	 * 
	 */
	class Project extends Eloquent
	{
		protected $table = 'projects';
		protected $softDelete = true;

		function user()
		{
			return $this->belongsTo('User', 'author_id');
		}

		function images()
		{
			return $this->hasMany('Image', 'project_id');
		}

		function categories()
		{
			return $this->belongsToMany('Category');
		}

		function likes()
		{
			return $this->belongsToMany('User', 'likes');
		}

		function comments()
		{
			return $this->hasMany('Comment', 'project_id');
		}

		

		function getCoverImgURL($width = NULL, $height = NULL)
		{
			if ($this->img_home) {
				$img = Image::find($this->img_home);
				return '/projects/' . $this->id . '/' . $img->filename;
			}else {
				return '';
			}
			
		}

	}
	?>