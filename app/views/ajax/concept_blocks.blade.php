@foreach($concepts as $concept)
	@include('blocks.concept', array('concept' => Concept::find($concept->id)))
@endforeach