<!-- Hero -->
<div class="jumbotron">
	<h1 class="display-4 text-center">
		<?php echo $data['setting'][0]['showcase_title']; ?>
	</h1>
	<p class="lead text-center">
		<?php echo $data['setting'][0]['showcase_content']; ?>
	</p>
	<hr class="my-4">
	<p class="text-center">
		Arama Ve Filtreleme Özellikleri İle Hayalinizdeki Kitapa Daha Çabuk Ulaşın.
	</p>

	<form class="my-2 my-lg-0" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<div class="row no-gutters">

			<div class="col-10">

				<div class="row">
					<div class="col-12 mb-3">
						<input class="form-control mr-sm-2" type="text" placeholder="Kitap Adı" name="book_name" aria-label="Search">
					</div>

					<!-- Categories -->
					<div class="col-4 d-flex align-items-center">
						<label for="" class="mb-0 pr-2">
							Kategori
						</label>
						<select name="category_id" class="form-control">
							<option value="0" selected>Hepsi</option>
							<?php foreach ($data['categories'] as $category): ?>
								<?php if ($data['book']['category_id'] == $category['id']): ?>
									<option value="<?php echo $category['id']; ?>" selected><?php echo $category['name']; ?></option>
									<?php else: ?>
										<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
									<?php endif?>
								<?php endforeach?>
							</select>
						</div>

						<div class="col-4 d-flex align-items-center">
							<label for="" class="mb-0 pr-2">
								Yazar(lar)
							</label>
							<select class="js-example-basic-multiple form-control" name="author[]" multiple="multiple">
								<?php foreach ($data['authors'] as $author): ?>
									<option value="<?php echo $author['id']; ?>"><?php echo $author['full_name']; ?></option>
								<?php endforeach?>
							</select>
						</div>

						<div class="col-2 d-flex align-items-center">
							<label for="" class="pr-2 mb-0">
								Beğeni 300+
							</label>
							<input type="checkbox" name="liked">
						</div>

						<div class="col-2 d-flex align-items-center">
							<label for="" class="pr-2 mb-0">
								Rating7+
							</label>
							<input type="checkbox" name="rating">
						</div>
					</div>
				</div>

				<div class="col-2 d-flex m-auto">
					<p class="lead m-auto">
						<input type="submit" class="btn btn-lg btn-success" name="search" value="Kitap Ara">
					</p>
				</div>

			</div>
		</form>

	</div>
	<!-- /Hero -->

	<!-- Search Result -->
	<?php if (isset($data['searchResult'])): ?>
		<div class="container mb-5">
			<div class="row">
				<div class="col-12 mb-4">
					<div class="h1">
						Arama Sonuçlarına uygun <?php echo count($data['searchResult']) ?> kitap bulundu
					</div>
				</div>
				<div class="col-12">
					<div class="slick-slider">
						<?php foreach ($data['searchResult'] as $book): ?>
							<div class="px-3 py-2">
								<a href="<?php echo ROOT_URL . 'books/show/' . $book['id'] ?>" class="card">
									<div class="card-image-wrapper">
										<img style="" src="<?php echo ROOT_URL . $book['image']; ?>" class="img-fluid" alt="<?php echo $data['book']['name'] ?>">
									</div>
									<div class="card-body card__body">
										<h5 class="card-title">
											<?php echo $book['name']; ?>
										</h5>
										<p class="card-text">
											<?php echo strlen($book['description']) > 150 ? substr($book['description'], 0, 150) . "..." : $book['description']; ?>
										</p>
									</div>
								</a>
							</div>
						<?php endforeach?>
					</div>
				</div>
			</div>
		</div>
	<?php endif?>

	<!-- Recent Added -->
	<div class="container mb-5">
		<div class="row">
			<div class="col-12 mb-4">
				<div class="h1">
					En Son Eklenenler
				</div>
			</div>
			<div class="col-12">
				<div class="slick-slider">
					<?php foreach ($data['recentBooks'] as $book): ?>
						<div class="px-3 py-2">
							<a href="<?php echo ROOT_URL . 'books/show/' . $book['id'] ?>" class="card">
								<div class="card-image-wrapper">
									<img style="" src="<?php echo ROOT_URL . $book['image']; ?>" class="img-fluid" alt="<?php echo $data['book']['name'] ?>">
								</div>
								<div class="card-body card__body">
									<h5 class="card-title">
										<?php echo $book['name']; ?>
									</h5>
									<p class="card-text">
										<?php echo strlen($book['description']) > 150 ? substr($book['description'], 0, 150) . "..." : $book['description']; ?>
									</p>
								</div>
							</a>
						</div>
					<?php endforeach?>
				</div>
			</div>
		</div>
	</div>

	<!-- showByViewed -->
	<div class="container mb-5">
		<div class="row">
			<div class="col-12 mb-4">
				<div class="h1">
					En Çok Izlenenler
				</div>
			</div>
			<div class="col-12">
				<div class="slick-slider">
					<?php foreach ($data['showByViewed'] as $book): ?>
						<div class="px-3 py-2">
							<a href="<?php echo ROOT_URL . 'books/show/' . $book['id'] ?>" class="card">
								<div class="card-image-wrapper">
									<img style="" src="<?php echo ROOT_URL . $book['image']; ?>" class="img-fluid" alt="<?php echo $data['book']['name'] ?>">
								</div>
								<div class="card-body card__body">
									<h5 class="card-title">
										<?php echo $book['name']; ?>
									</h5>
									<p class="card-text">
										<?php echo strlen($book['description']) > 150 ? substr($book['description'], 0, 150) . "..." : $book['description']; ?>
									</p>
								</div>
							</a>
						</div>
					<?php endforeach?>
				</div>
			</div>
		</div>
	</div>

	<!-- Recent Added -->
	<div class="container mb-5">
		<div class="row">
			<div class="col-12 mb-4">
				<div class="h1">
					En Çok Rating Yapanlar
				</div>
			</div>
			<div class="col-12">
				<div class="slick-slider">
					<?php foreach ($data['showByRating'] as $book): ?>
						<div class="px-3 py-2">
							<a href="<?php echo ROOT_URL . 'books/show/' . $book['id'] ?>" class="card">
								<div class="card-image-wrapper">
									<img style="" src="<?php echo ROOT_URL . $book['image']; ?>" class="img-fluid" alt="<?php echo $data['book']['name'] ?>">
								</div>
								<div class="card-body card__body">
									<h5 class="card-title">
										<?php echo $book['name']; ?>
									</h5>
									<p class="card-text">
										<?php echo strlen($book['description']) > 150 ? substr($book['description'], 0, 150) . "..." : $book['description']; ?>
									</p>
								</div>
							</a>
						</div>
					<?php endforeach?>
				</div>
			</div>
		</div>
	</div>

	<!-- Scripts For Home Page -->
	<link href="<?php echo ROOT_URL . 'assets/' ?>css/slick.css" rel="stylesheet" />
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/slick.min.js" defer></script>

	<link href="<?php echo ROOT_URL . 'assets/' ?>css/select2.min.css" rel="stylesheet" />
	<script src="<?php echo ROOT_URL . 'assets/' ?>js/select2.min.js" defer></script>

	<script type="module">
		$(document).ready(function() {
			$('.js-example-basic-multiple').select2();

			$('.slick-slider').slick({
				slidesToShow: 4,
				prevArrow: '<button class="slide-arrow prev-arrow"></button>',
				nextArrow: '<button class="slide-arrow next-arrow"></button>'
			});
		});
	</script>