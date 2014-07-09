<?php 
	/*
	 * 
	 */
	class Concept extends Eloquent
	{
		protected $table = 'concepts';

		function categories()
		{
			return $this->belongsToMany('Category');
		}
		function languages()
		{
			return $this->belongsToMany('Language');
		}


		function getImgURL($width = NULL, $height = NULL)
		{
			if ($this->img_id) {
				$img = Image::find($this->img_id);
				return '/concepts/' . $this->id . '/' . $img->filename;
			}else {
				return '';
			}
			
		}

	}
	?>