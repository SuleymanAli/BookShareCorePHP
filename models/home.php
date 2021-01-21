<?php

class HomeModel extends Model {
	public function index() {

		if (isset($_POST['search'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$query = [];

			if (!empty($post['book_name'])) {
				array_push($query, 'name LIKE ' . '"%' . $post['book_name'] . '%"');
			}

			if (!empty($post['liked'])) {
				array_push($query, 'liked > 300');
			}

			if (!empty($post['rating'])) {
				array_push($query, 'rating > 7');
			}

			if (!empty($post['category_id'])) {
				array_push($query, 'category_id = ' . $post['category_id']);
			}

			if (!empty($post['author']) && !empty($query)) {
				/* Seach Only By Authors */

				if (count($query) > 1) {
					// Multiple Query
					$fixedQuery = ' AND books.' . join(' AND books.', $query);
				} else {
					// Single Query
					$fixedQuery = ' AND books.' . $query[0];
				}

				$this->query('
					SELECT books.*, author_books.* FROM books
					LEFT JOIN author_books ON books.id = author_books.book_id
					WHERE author_books.author_id IN(' . implode(", ", $post['author']) . ')' . $fixedQuery . ' GROUP BY books.id
				');

				return $this->all();
			} else if (!empty($post['author']) && empty($query)) {
				/* Seach Only By Author And Query */

				$this->query('
					SELECT books.*, author_books.* FROM books
					LEFT JOIN author_books ON books.id = author_books.book_id
					WHERE author_books.author_id IN(' . implode(",", $post['author']) . ') GROUP BY books.id
				');

				return $this->all();
			}

			/* Seach Only Query */
			$fixedQuery = join(' AND ', $query);

			$this->query('SELECT * FROM books WHERE ' . $fixedQuery);

			return $this->all();
		}
	}
}

?>