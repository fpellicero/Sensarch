<?php

class CommentController extends BaseController {

	public function store($project_id)
	{
		$comment = new Comment();

		$comment->project_id = $project_id;
		$comment->user_id = Sentry::getUser()->id;
		$comment->comment = Input::get('comment');
		$comment->save();

		if (Request::ajax()) {
			return Response::json(array('comment' => $comment), 201);
		}else {
			return Redirect::back(201);
		}
	}

}