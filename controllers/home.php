<?php

class Home extends Controller {
	public function index() {
		$categories = new Category();
		$authors = new Author();
		$searchResult = new HomeModel();
		$book = new Book();
		$setting = new Setting();

		return $this->view([
			'categories' => $categories->index(),
			'authors' => $authors->index(),
			'searchResult' => $searchResult->index(),
			'recentBooks' => $book->index(),
			'showByViewed' => $book->showByViewed(),
			'showByRating' => $book->showByRating(),
			'setting' => $setting->index(),
		], 'front', 'front');
	}
}

?>