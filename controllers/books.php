<?php

class Books extends Controller {
	public function index() {
		$book = new Book();
		return $this->view($book->byUser(), 'front', 'front');
	}

	public function create() {
		$book = new Book();
		$categories = new \Category();
		$authors = new \Author();

		return $this->view([
			'book' => $book->create(),
			'categories' => $categories->index(),
			'authors' => $authors->index(),
		], 'front', 'front');
	}

	public function show() {
		$book = new Book();
		$comments = new Comment();

		$book->increaseViewCount();

		return $this->view([
			'book' => $book->show(),
			'comments' => $comments->withUser(),
		], 'front', 'front');
	}

	public function edit() {
		$book = new Book();
		$categories = new \Category();
		$authors = new \Author();

		return $this->view([
			'book' => $book->edit(),
			'categories' => $categories->index(),
			'authors' => $authors->index(),
		], 'front', 'front');
	}

	public function delete() {
		$book = new Book();

		return $book->delete();
	}

	public function increaseLikeCount() {
		$favorite = new Favorite();

		$favorite->increaseLikeCount();

		Message::setMessage('success', 'Kitab Favorilerinize Eklendi');

		header('Location:' . $_SERVER['HTTP_REFERER']);
		exit();
	}

	public function decreaseLikeCount() {
		$favorite = new Favorite();

		$favorite->decreaseLikeCount();

		Message::setMessage('success', 'Kitab Favorilerinizden Silindi');

		header('Location:' . $_SERVER['HTTP_REFERER']);
		exit();
	}

	public function showFavoritesAll() {

	}

	public function showFavoritesByUser() {
		$favorite = new Favorite();

		return $this->view($favorite->showFavoritesByUser(), 'front', 'front');
	}
}

?>