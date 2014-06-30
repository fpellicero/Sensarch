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
			return '/img/profile_blank.png';
		}
	}
?>