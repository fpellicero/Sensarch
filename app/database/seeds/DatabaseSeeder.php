<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');

		$this->call('ProjectsTableSeeder');
	}

}

/**
* 
*/
class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		User::create(
			array(
				'username' => 'pelly',
				'password' => Hash::make('pelly9601bln')
				)
			);
	}
}

/**
* 
*/
class ProjectsTableSeeder extends Seeder
{
	public function run()
	{
		Project::create(
			array(
				'title' => 'Projecte de Prova 1',
				'description' => 
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat luctus, mattis lectus ac, tincidunt urna. Donec sed nibh turpis. Phasellus malesuada nunc et nisi ultrices aliquet. Curabitur id commodo lorem, quis pretium purus. Nam vitae nunc faucibus, imperdiet quam a, lacinia magna. Proin porttitor risus sit amet orci auctor pharetra. Phasellus vehicula augue eu orci rutrum, vitae posuere massa pharetra. Aliquam ac dolor vitae sem aliquam convallis nec a massa. Ut non libero eget turpis scelerisque sodales. Donec dictum lacus lacus, id ultricies massa mattis fermentum. Nam sagittis laoreet leo vitae fermentum. Maecenas quis ullamcorper leo, eget placerat odio. Praesent vitae lectus aliquam, luctus enim sed, fringilla lorem.

					Nulla ac sem vel orci bibendum accumsan. Suspendisse potenti. Aliquam venenatis eros et suscipit fermentum. In auctor tincidunt arcu, in cursus quam bibendum ut. Aliquam leo nunc, aliquam ac risus at, accumsan dapibus nibh. Sed metus risus, ullamcorper non velit id, cursus blandit urna. Pellentesque feugiat sapien non nisi gravida, non facilisis tellus fermentum.

					Donec venenatis dapibus nisi ut ultricies. Aliquam convallis ornare vehicula. Mauris eu placerat lacus, nec convallis justo. Duis aliquet dolor nibh, sit amet blandit dolor varius quis. Etiam sit amet nunc eget ipsum varius molestie at non sapien. Ut eget nisl eu orci egestas semper non eget tortor. Nullam dapibus est quam, non lacinia sapien tempor ut. Donec at urna lobortis nibh hendrerit eleifend. Sed a aliquet leo.

					Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vestibulum a dui eu consectetur. Duis eu ante sit amet massa hendrerit hendrerit rhoncus a metus. Sed varius iaculis cursus. Quisque urna massa, gravida eu sem et, auctor pellentesque enim. Vestibulum ac enim interdum, ultrices sem vitae, elementum ligula. Suspendisse potenti.

					Integer quis auctor nulla. Aenean pulvinar elit adipiscing, facilisis dui vehicula, tristique purus. Integer a risus a nulla elementum tincidunt at et quam. Ut ac justo a eros aliquet porttitor. Curabitur malesuada, massa non pharetra tincidunt, lacus lorem varius velit, a vestibulum neque mi at enim. Mauris molestie nibh eget ipsum tempus, non adipiscing nisl rhoncus. Proin sed faucibus sapien. Sed non est eu purus sodales dictum ac at elit. Maecenas vestibulum turpis ut nisi auctor, sit amet blandit nunc condimentum. Nullam placerat ultricies tortor, id imperdiet felis elementum a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Nam posuere dapibus aliquam. Curabitur consequat, leo nec blandit iaculis, orci diam venenatis libero, sit amet lacinia mi massa ac ipsum. Nunc a eleifend lorem. Vivamus a enim nunc. ',
				'city' => 'Barcelona',
				'author_id' => 1	
			)
		);

		Project::create(
			array(
				'title' => 'Projecte de Prova 2',
				'description' => 
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat luctus, mattis lectus ac, tincidunt urna. Donec sed nibh turpis. Phasellus malesuada nunc et nisi ultrices aliquet. Curabitur id commodo lorem, quis pretium purus. Nam vitae nunc faucibus, imperdiet quam a, lacinia magna. Proin porttitor risus sit amet orci auctor pharetra. Phasellus vehicula augue eu orci rutrum, vitae posuere massa pharetra. Aliquam ac dolor vitae sem aliquam convallis nec a massa. Ut non libero eget turpis scelerisque sodales. Donec dictum lacus lacus, id ultricies massa mattis fermentum. Nam sagittis laoreet leo vitae fermentum. Maecenas quis ullamcorper leo, eget placerat odio. Praesent vitae lectus aliquam, luctus enim sed, fringilla lorem.

					Nulla ac sem vel orci bibendum accumsan. Suspendisse potenti. Aliquam venenatis eros et suscipit fermentum. In auctor tincidunt arcu, in cursus quam bibendum ut. Aliquam leo nunc, aliquam ac risus at, accumsan dapibus nibh. Sed metus risus, ullamcorper non velit id, cursus blandit urna. Pellentesque feugiat sapien non nisi gravida, non facilisis tellus fermentum.

					Donec venenatis dapibus nisi ut ultricies. Aliquam convallis ornare vehicula. Mauris eu placerat lacus, nec convallis justo. Duis aliquet dolor nibh, sit amet blandit dolor varius quis. Etiam sit amet nunc eget ipsum varius molestie at non sapien. Ut eget nisl eu orci egestas semper non eget tortor. Nullam dapibus est quam, non lacinia sapien tempor ut. Donec at urna lobortis nibh hendrerit eleifend. Sed a aliquet leo.

					Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vestibulum a dui eu consectetur. Duis eu ante sit amet massa hendrerit hendrerit rhoncus a metus. Sed varius iaculis cursus. Quisque urna massa, gravida eu sem et, auctor pellentesque enim. Vestibulum ac enim interdum, ultrices sem vitae, elementum ligula. Suspendisse potenti.

					Integer quis auctor nulla. Aenean pulvinar elit adipiscing, facilisis dui vehicula, tristique purus. Integer a risus a nulla elementum tincidunt at et quam. Ut ac justo a eros aliquet porttitor. Curabitur malesuada, massa non pharetra tincidunt, lacus lorem varius velit, a vestibulum neque mi at enim. Mauris molestie nibh eget ipsum tempus, non adipiscing nisl rhoncus. Proin sed faucibus sapien. Sed non est eu purus sodales dictum ac at elit. Maecenas vestibulum turpis ut nisi auctor, sit amet blandit nunc condimentum. Nullam placerat ultricies tortor, id imperdiet felis elementum a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Nam posuere dapibus aliquam. Curabitur consequat, leo nec blandit iaculis, orci diam venenatis libero, sit amet lacinia mi massa ac ipsum. Nunc a eleifend lorem. Vivamus a enim nunc. ',
				'city' => 'Barcelona',
				'author_id' => 1	
			)
		);

		Project::create(
			array(
				'title' => 'Projecte de Prova 3',
				'description' => 
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat luctus, mattis lectus ac, tincidunt urna. Donec sed nibh turpis. Phasellus malesuada nunc et nisi ultrices aliquet. Curabitur id commodo lorem, quis pretium purus. Nam vitae nunc faucibus, imperdiet quam a, lacinia magna. Proin porttitor risus sit amet orci auctor pharetra. Phasellus vehicula augue eu orci rutrum, vitae posuere massa pharetra. Aliquam ac dolor vitae sem aliquam convallis nec a massa. Ut non libero eget turpis scelerisque sodales. Donec dictum lacus lacus, id ultricies massa mattis fermentum. Nam sagittis laoreet leo vitae fermentum. Maecenas quis ullamcorper leo, eget placerat odio. Praesent vitae lectus aliquam, luctus enim sed, fringilla lorem.

					Nulla ac sem vel orci bibendum accumsan. Suspendisse potenti. Aliquam venenatis eros et suscipit fermentum. In auctor tincidunt arcu, in cursus quam bibendum ut. Aliquam leo nunc, aliquam ac risus at, accumsan dapibus nibh. Sed metus risus, ullamcorper non velit id, cursus blandit urna. Pellentesque feugiat sapien non nisi gravida, non facilisis tellus fermentum.

					Donec venenatis dapibus nisi ut ultricies. Aliquam convallis ornare vehicula. Mauris eu placerat lacus, nec convallis justo. Duis aliquet dolor nibh, sit amet blandit dolor varius quis. Etiam sit amet nunc eget ipsum varius molestie at non sapien. Ut eget nisl eu orci egestas semper non eget tortor. Nullam dapibus est quam, non lacinia sapien tempor ut. Donec at urna lobortis nibh hendrerit eleifend. Sed a aliquet leo.

					Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vestibulum a dui eu consectetur. Duis eu ante sit amet massa hendrerit hendrerit rhoncus a metus. Sed varius iaculis cursus. Quisque urna massa, gravida eu sem et, auctor pellentesque enim. Vestibulum ac enim interdum, ultrices sem vitae, elementum ligula. Suspendisse potenti.

					Integer quis auctor nulla. Aenean pulvinar elit adipiscing, facilisis dui vehicula, tristique purus. Integer a risus a nulla elementum tincidunt at et quam. Ut ac justo a eros aliquet porttitor. Curabitur malesuada, massa non pharetra tincidunt, lacus lorem varius velit, a vestibulum neque mi at enim. Mauris molestie nibh eget ipsum tempus, non adipiscing nisl rhoncus. Proin sed faucibus sapien. Sed non est eu purus sodales dictum ac at elit. Maecenas vestibulum turpis ut nisi auctor, sit amet blandit nunc condimentum. Nullam placerat ultricies tortor, id imperdiet felis elementum a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Nam posuere dapibus aliquam. Curabitur consequat, leo nec blandit iaculis, orci diam venenatis libero, sit amet lacinia mi massa ac ipsum. Nunc a eleifend lorem. Vivamus a enim nunc. ',
				'city' => 'Barcelona',
				'author_id' => 1	
			)
		);

		Project::create(
			array(
				'title' => 'Projecte de Prova 4',
				'description' => 
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat luctus, mattis lectus ac, tincidunt urna. Donec sed nibh turpis. Phasellus malesuada nunc et nisi ultrices aliquet. Curabitur id commodo lorem, quis pretium purus. Nam vitae nunc faucibus, imperdiet quam a, lacinia magna. Proin porttitor risus sit amet orci auctor pharetra. Phasellus vehicula augue eu orci rutrum, vitae posuere massa pharetra. Aliquam ac dolor vitae sem aliquam convallis nec a massa. Ut non libero eget turpis scelerisque sodales. Donec dictum lacus lacus, id ultricies massa mattis fermentum. Nam sagittis laoreet leo vitae fermentum. Maecenas quis ullamcorper leo, eget placerat odio. Praesent vitae lectus aliquam, luctus enim sed, fringilla lorem.

					Nulla ac sem vel orci bibendum accumsan. Suspendisse potenti. Aliquam venenatis eros et suscipit fermentum. In auctor tincidunt arcu, in cursus quam bibendum ut. Aliquam leo nunc, aliquam ac risus at, accumsan dapibus nibh. Sed metus risus, ullamcorper non velit id, cursus blandit urna. Pellentesque feugiat sapien non nisi gravida, non facilisis tellus fermentum.

					Donec venenatis dapibus nisi ut ultricies. Aliquam convallis ornare vehicula. Mauris eu placerat lacus, nec convallis justo. Duis aliquet dolor nibh, sit amet blandit dolor varius quis. Etiam sit amet nunc eget ipsum varius molestie at non sapien. Ut eget nisl eu orci egestas semper non eget tortor. Nullam dapibus est quam, non lacinia sapien tempor ut. Donec at urna lobortis nibh hendrerit eleifend. Sed a aliquet leo.

					Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vestibulum a dui eu consectetur. Duis eu ante sit amet massa hendrerit hendrerit rhoncus a metus. Sed varius iaculis cursus. Quisque urna massa, gravida eu sem et, auctor pellentesque enim. Vestibulum ac enim interdum, ultrices sem vitae, elementum ligula. Suspendisse potenti.

					Integer quis auctor nulla. Aenean pulvinar elit adipiscing, facilisis dui vehicula, tristique purus. Integer a risus a nulla elementum tincidunt at et quam. Ut ac justo a eros aliquet porttitor. Curabitur malesuada, massa non pharetra tincidunt, lacus lorem varius velit, a vestibulum neque mi at enim. Mauris molestie nibh eget ipsum tempus, non adipiscing nisl rhoncus. Proin sed faucibus sapien. Sed non est eu purus sodales dictum ac at elit. Maecenas vestibulum turpis ut nisi auctor, sit amet blandit nunc condimentum. Nullam placerat ultricies tortor, id imperdiet felis elementum a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Nam posuere dapibus aliquam. Curabitur consequat, leo nec blandit iaculis, orci diam venenatis libero, sit amet lacinia mi massa ac ipsum. Nunc a eleifend lorem. Vivamus a enim nunc. ',
				'city' => 'Barcelona',
				'author_id' => 1	
			)
		);

		Project::create(
			array(
				'title' => 'Projecte de Prova 5',
				'description' => 
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec erat luctus, mattis lectus ac, tincidunt urna. Donec sed nibh turpis. Phasellus malesuada nunc et nisi ultrices aliquet. Curabitur id commodo lorem, quis pretium purus. Nam vitae nunc faucibus, imperdiet quam a, lacinia magna. Proin porttitor risus sit amet orci auctor pharetra. Phasellus vehicula augue eu orci rutrum, vitae posuere massa pharetra. Aliquam ac dolor vitae sem aliquam convallis nec a massa. Ut non libero eget turpis scelerisque sodales. Donec dictum lacus lacus, id ultricies massa mattis fermentum. Nam sagittis laoreet leo vitae fermentum. Maecenas quis ullamcorper leo, eget placerat odio. Praesent vitae lectus aliquam, luctus enim sed, fringilla lorem.

					Nulla ac sem vel orci bibendum accumsan. Suspendisse potenti. Aliquam venenatis eros et suscipit fermentum. In auctor tincidunt arcu, in cursus quam bibendum ut. Aliquam leo nunc, aliquam ac risus at, accumsan dapibus nibh. Sed metus risus, ullamcorper non velit id, cursus blandit urna. Pellentesque feugiat sapien non nisi gravida, non facilisis tellus fermentum.

					Donec venenatis dapibus nisi ut ultricies. Aliquam convallis ornare vehicula. Mauris eu placerat lacus, nec convallis justo. Duis aliquet dolor nibh, sit amet blandit dolor varius quis. Etiam sit amet nunc eget ipsum varius molestie at non sapien. Ut eget nisl eu orci egestas semper non eget tortor. Nullam dapibus est quam, non lacinia sapien tempor ut. Donec at urna lobortis nibh hendrerit eleifend. Sed a aliquet leo.

					Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vestibulum a dui eu consectetur. Duis eu ante sit amet massa hendrerit hendrerit rhoncus a metus. Sed varius iaculis cursus. Quisque urna massa, gravida eu sem et, auctor pellentesque enim. Vestibulum ac enim interdum, ultrices sem vitae, elementum ligula. Suspendisse potenti.

					Integer quis auctor nulla. Aenean pulvinar elit adipiscing, facilisis dui vehicula, tristique purus. Integer a risus a nulla elementum tincidunt at et quam. Ut ac justo a eros aliquet porttitor. Curabitur malesuada, massa non pharetra tincidunt, lacus lorem varius velit, a vestibulum neque mi at enim. Mauris molestie nibh eget ipsum tempus, non adipiscing nisl rhoncus. Proin sed faucibus sapien. Sed non est eu purus sodales dictum ac at elit. Maecenas vestibulum turpis ut nisi auctor, sit amet blandit nunc condimentum. Nullam placerat ultricies tortor, id imperdiet felis elementum a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Nam posuere dapibus aliquam. Curabitur consequat, leo nec blandit iaculis, orci diam venenatis libero, sit amet lacinia mi massa ac ipsum. Nunc a eleifend lorem. Vivamus a enim nunc. ',
				'city' => 'Barcelona',
				'author_id' => 1	
			)
		);
	}
}