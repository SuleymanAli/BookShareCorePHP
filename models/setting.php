<?php

class Setting extends Model {
	public function index() {
		if (isset($_POST['update_setting'])) {

			// Sanitize Post
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$this->query('UPDATE settings SET site_title = :site_title, showcase_title = :showcase_title, showcase_content = :showcase_content, facebook_url = :facebook_url, instagram_url = :instagram_url WHERE id = 1');

			$this->bind(':site_title', $post['site_title']);
			$this->bind(':showcase_title', $post['showcase_title']);
			$this->bind(':showcase_content', $post['showcase_content']);
			$this->bind(':facebook_url', $post['facebook_url']);
			$this->bind(':instagram_url', $post['instagram_url']);
			$this->execute();

			Message::setMessage('success', 'Settings Changed Successfully');
		}

		$this->query('SELECT * FROM settings');

		return $this->all();
	}

	public function show() {
		$this->query('SELECT * FROM settings');
		return $this->first();
	}
}

?>