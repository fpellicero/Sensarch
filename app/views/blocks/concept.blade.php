<div class='concept_block row'>
				<div class='img_wrapper col-xs-3'>
					<img src="{{ Croppa::url($concept->getImgUrl(), 250, 250) }}">
				</div>
				<div class='concept_info col-xs-9'>
					<a href="{{ $concept->url }}" target='_blank'>
						<h2>{{ $concept->title }}</h2>
					</a>

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
						<span class='value'>
							@foreach($concept->languages as $index => $language)
								@if ($index > 0)
									,
								@endif
								{{ $language->name }}
							@endforeach
						</span>
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
						<span class='value'>
							@foreach($concept->categories as $index => $category)
								@if ($index > 0)
									,
								@endif
								{{ $category->name }}
							@endforeach
						</span>
					</div>
				</div>
			</div>