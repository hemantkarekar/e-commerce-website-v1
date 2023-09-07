<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>404 Page Not Found</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url("assets/css/style.min.css") ?>">
	<link rel="stylesheet" href="<?= base_url("assets/css/errors.min.css") ?>">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<main>
		<div class="container mt-4">
			<!-- <h2 class="text-danger"><?php echo $heading; ?></h2>
			<?php echo $message; ?> -->
			<section class="content">
				<div class="row m-0 align-items-center h-100">
					<div class="col-12 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="title">
									<h1 class="text-danger">Whoops!</h1>
									<p class="title-text">This page got lost in the conversation...</p>
								</div>
								<div class="desc">
									<p>
										Not to worry! <br>
										You can head over to our <a href="<?= base_url() ?>">Home Page</a> or can always check out our <a href="<?= base_url('search?cat=all&sk=') ?>">Products</a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-12 mb-3">
						<div class="card">
							<div class="card-header">
								<strong>Best Selling Products</strong>
							</div>
							<div class="card-body">
								<div class="row m-0">
									<?php foreach ($products['featured'] as $featured) : ?>
										<div class="col-lg-3 col-6 mb-3">
											<a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $featured['product_id']) ?>?ref=featured_products_home" target="_blank">
												<div class="tile_image square">
													<img src="<?= $featured['image'] ?>" alt="<?= $featured['name'] ?>">
												</div>
											</a>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6"></div>
				</div>
			</section>
		</div>
	</main>
</body>

</html>