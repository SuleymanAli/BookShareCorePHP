<?php

namespace Admin;

class Books extends \Controller {
	public function index() {
		$book = new \Book();
		return $this->view($book->index(), 'admin', 'admin');
	}

	public function create() {
		$book = new \Book();
		$categories = new \Category();
		$authors = new \Author();

		return $this->view([
			'book' => $book->create(),
			'categories' => $categories->index(),
			'authors' => $authors->index(),
		], 'admin', 'admin');
	}

	public function show() {
		$book = new \Book();

		return $this->view($book->show(), 'admin', 'admin');
	}

	public function edit() {
		$book = new \Book();
		$categories = new \Category();
		$authors = new \Author();

		return $this->view([
			'book' => $book->edit(),
			'categories' => $categories->index(),
			'authors' => $authors->index(),
		], 'admin', 'admin');
	}

	public function delete() {
		$book = new \Book();

		return $book->delete();
	}

	public function favorites() {
		$favorites = new \Favorite();

		return $this->view($favorites->showFavoritesAll(), 'admin', 'admin');
	}
}

?>