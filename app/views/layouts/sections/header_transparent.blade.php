<div class='page-header' id="header_fixe_blanc">
	<div id="logo">
		<a href={{ URL::route('home') }}>
			<span id="negrita">Sens</span><span id="thin">arch</span>
		</a>
	</div>
	<div id='nav_links_header' class='hidden-xs'>
		<a href={{ URL::route('home') }}>HOME</a>
		<a href={{ URL::action('userProfile', array(Auth::user()->id)) }}>PERFIL</a>
		<a href={{ URL::route('logout') }}>SALIR</a>
	</div>

	<div class="dropdown visible-xs">
		<button class="btn dropdown-toggle sr-only" type="button" id="dropdown" data-toggle="dropdown">
			Dropdown
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
		</ul>
	</div>

</div>