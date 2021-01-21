<div class="container" id="container">
	<div class="row">
	</div>
	<div class="row py-4" id="main">

		<div class="col-9">
			<div class="card mb-4 shadow-sm d-flex flex-row no-gutters">
				<div class="col-4 order-2" style="height: 400px; overflow: hidden;">
					<img src="<?php echo ROOT_URL . $data['book']['image']; ?>" class="img-fluid w-100" style="object-fit: cover;" alt="<?php echo $data['book']['name'] ?>">
				</div>
				<div class="col-8 order-1">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">
							<?php echo $data['book']['name']; ?>
						</h4>
					</div>
					<div class="card-body">
						<ul class="list-unstyled mt-3 mb-4">
							<li>
								<?php echo $data['book']['description']; ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-3">
			<ul class="list-group">
				<li class="list-group-item">
					Yazarlar:
					<?php if (isset($data['book']['authors'])): ?>
						<?php foreach ($data['book']['authors'] as $author): ?>
							<?php echo $author['full_name']; ?>
						<?php endforeach?>
					<?php endif?>
				</li>
				<li class="list-group-item">
					Beğeni: <?php echo $data['book']['liked']; ?>
				</li>
				<li class="list-group-item">
					Rating: <?php echo $data['book']['rating']; ?>
				</li>
				<li class="list-group-item">
					Kategori: <?php echo $data['book']['category_name']; ?>
				</li>
				<li class="list-group-item">
					Eklendi: <?php echo date('d M Y', strtotime($data['book']['created_at'])); ?>
				</li>
				<li class="list-group-item">
					Kullanıcı: <?php echo $data['book']['user_name']; ?>
				</li>
			</ul>
			<div class="card mt-3 py-3">
				<div class="d-flex flex-column">
					<!-- <form method="POST" action="" class="mx-2">
						<input class="btn btn-block btn-outline-primary" type="submit" value="Favorilere Ekle">
					</form> -->
					<div class="px-3">
						<a href="<?php echo ROOT_URL . 'books/increaseLikeCount/' . $data['book']['id'] ?>" class="btn btn-block btn-outline-primary">Favorilere Ekle</a>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div id="comment-form" class="col-md-6 mx-auto">
			<?php if (isset($_SESSION['is_user_logged_in'])): ?>
				<form method="POST" action="<?php echo ROOT_URL . 'comments/create' ?>">

					<div class="row">
						<div class="col-12 mx-auto">
							<div class="d-flex">
								<textarea class="form-control" rows="2" name="content" cols="50" placeholder="Yorum Ekleyin..."></textarea>
								<input type="hidden" name="book_id" value="<?php echo $data['book']['id']; ?>">
								<input class="btn btn-success align-self-center ml-3" type="submit" name="submit" value="Ekle">
							</div>
						</div>
					</div>
				</form>
				<?php else: ?>
					<div class="text-center mt-2">
						Yorum yapmak için lütfen
						<a href="<?php echo ROOT_URL . 'users/login' ?>" class="text-primary">
							Giriş Yapın
						</a>
						veya
						<a href="<?php echo ROOT_URL . 'users/register' ?>" class="text-primary">
							Kayıt Olun
						</a>
					</div>
				<?php endif?>

				<div class="my-4">
					<?php foreach ($data['comments'] as $comment): ?>
						<div class="card my-2 p-3">
							<div class="d-flex justify-content-between">
								<div class="text-primary">
									<?php echo $comment['user_name']; ?>
								</div>
								<div class="">
									<?php echo date('d M Y', strtotime($comment['created_at'])); ?>
								</div>
							</div>
							<?php echo $comment['content']; ?>
						</div>
					<?php endforeach?>
				</div>
			</div>
		</div>
	</div>