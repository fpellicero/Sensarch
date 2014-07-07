<?php 
	/*
	 * 
	 */
	class Concept extends Eloquent
	{
		protected $table = 'concepts';

		function language()
		{
			return $this->belongsTo('Language');
		}


		function getImgURL($width = NULL, $height = NULL)
		{
			if ($this->cover_img) {
				$img = Image::find($this->cover_img);
				return '/concepts/' . $this->id . '/' . $img->filename;
			}else {
				return '';
			}
			
		}

	}
	?>