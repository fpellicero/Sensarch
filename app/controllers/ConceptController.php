<?php

class ConceptController extends BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	public function feed()
	{
		$concepts = Concept::all();

		return View::make('concept/list', array('concepts' => $concepts));
	}

	public function search()
	{
		$query = Input::get('query');
		$min_prize = Input::get('min_prize');
		$max_prize = Input::get('max_prize');

		$concepts = DB::table('concepts')
			->where('title', 'like', '%' . $query . '%')
			->whereBetween('prize', array($min_prize, $max_prize));


		$categories = Input::get('categories');
		if ($categories) {
			$concepts->whereExists(function ($query) use ($categories) {
				$query->select(DB::raw(1))
					->from('category_concept')
					->whereRaw('concept_id = concepts.id')
					->whereIn('category_id', $categories);
			});
		}

		$languages = Input::get('languages');
		if ($languages) {
			$concepts->whereExists(function ($query) use ($languages) {
				$query->select(DB::raw(1))
					->from('concept_language')
					->whereRaw('concept_id = concepts.id')
					->whereIn('language_id', $languages);
			});
		}

		$concepts = $concepts->get();

		return View::make('ajax/concept_blocks', array('concepts' => $concepts));

	}

	public function import()
	{
		$feed = file_get_contents('http://blogdeconcursos.com/feed/');
		$xml = simplexml_load_string($feed,'SimpleXMLElement', LIBXML_NOCDATA);

		$items = $xml->channel->item;

		echo "<pre>";
		foreach ($items as $item) {
			$desc = preg_split("/(?<=\w)\b\s*/", $item->description, -1, PREG_SPLIT_NO_EMPTY);
;
			var_dump($item);
		}
		echo "</pre>";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}
}
