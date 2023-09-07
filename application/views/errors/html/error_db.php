<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Database Error</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- <link rel="stylesheet" href="/assets/packages/css/sb-admin-2.css"> -->
	<link rel="stylesheet" href="<?= base_url("assets/css/style.min.css") ?>">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<div class="container py-3">
		<div class="card">
			<div class="card-body">
				<h2 class="text-danger"><?php echo $heading; ?></h2>
				<div class="row m-0">
					<div class="col-lg-auto col-md-6">
						<img src="<?= base_url() ?>assets/errors/database-error.png" alt="" width="400">
					</div>
					<div class="col-lg col-md-6">
						<?php echo $message; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>