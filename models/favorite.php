<?php

class Favorite extends Model {
	public function increaseLikeCount() {
		$this->query('
			UPDATE books SET liked = liked + 1 WHERE id = :id
			');
		$this->bind(':id', $_GET['id']);
		$this->execute();

		$this->query('
			INSERT INTO favorites (user_id, book_id) VALUES (:user_id, :book_id)
			');
		$this->bind(':user_id', $_SESSION['user']['id']);
		$this->bind(':book_id', $_GET['id']);
		return $this->execute();
	}

	public function decreaseLikeCount() {
		$this->query('
			UPDATE books SET liked = liked - 1 WHERE id = :id
			');
		$this->bind(':id', $_GET['id']);
		$this->execute();

		$this->query('DELETE FROM favorites WHERE book_id = :book_id AND user_id = :user_id');
		$this->bind(':user_id', $_SESSION['user']['id']);
		$this->bind(':book_id', $_GET['id']);
		return $this->execute();
	}

	public function showFavoritesAll() {
		$this->query('
			SELECT favorites.id as id, books.name as book_name, users.full_name as user_name FROM favorites
			LEFT JOIN books ON books.id = favorites.book_id
			LEFT JOIN users ON users.id = favorites.user_id
			ORDER BY user_name
		');

		return $this->all();
	}

	public function showFavoritesByUser() {
		$this->query('
			SELECT books.* FROM favorites
			LEFT JOIN books ON favorites.book_id = books.id
			WHERE favorites.user_id = :user_id
			');
		$this->bind(':user_id', $_SESSION['user']['id']);

		return $this->all();
	}
}

?>