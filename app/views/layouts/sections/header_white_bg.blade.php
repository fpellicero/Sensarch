<div class='page-header' id="header_fixe_negre">
	<div id="logo">
		<a href={{ URL::route('home') }}>
			<span id="negrita">Sens</span><span id="thin">arch</span>
		</a>
	</div>
	<div id='nav_links_header'>
		<a href={{ URL::route('home') }}>HOME</a>
		<a href={{ URL::action('userProfile', array(Auth::user()->id)) }}>PERFIL</a>
		<a href={{ URL::route('logout') }}>SALIR</a>
	</div>
</div>