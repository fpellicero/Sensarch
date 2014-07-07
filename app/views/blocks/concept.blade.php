<div class='concept_block row'>
				<div class='img_wrapper col-xs-3'>
					<img src="/img/profile_blank.png">
				</div>
				<div class='concept_info col-xs-9'>
					<h2>{{ $concept->title }}</h2>

					<div>
						<span class='concept_label'>Entrega:</span>
						<span class='value'>{{ date('j F Y', strtotime($concept->delivery_date)) }}</span>
					</div>
					<div>
						<span class='concept_label'>Inscripción:</span>
						<span class='value'>{{ date('j F Y', strtotime($concept->register_date)) }}</span>
					</div>
					<div>
						<span class='concept_label'>Idioma:</span>
						<span class='value'>{{ $concept->language->name }}</span>
					</div>
					<div>
						<span class='concept_label'>Localización:</span>
						<span class='value'>{{ $concept->city }}</span>
					</div>
					<div>
						<span class='concept_label'>Premios:</span>
						<span class='value'>{{ $concept->prize }}€</span>
					</div>
					<div>
						<span class='concept_label'>Categoria:</span>
						<span class='value'>Lorem ipsum</span>
					</div>
				</div>
			</div>