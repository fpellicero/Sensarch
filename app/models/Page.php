<?php 

class Page extends Eloquent
{
	protected $table = 'pages';
	protected $softDelete = true;

	function user()
	{
		return $this->belongsTo('User');
	}

	public function getProfilePicURL()
	{
		$img = Image::find($this->page_img);
		if ($img) {
			return '/pages/' . $img->filename;
		}else {
			return '/img/profile_blank.png';
		}
	}
}
?>