<?php

class Comments extends Controller {
	public function create() {
		$comment = new Comment();
		return $comment->create();
	}
}

?>