<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container mt-3">
	<div class="card">
		<div class="card-body">
			<h4 class="text-danger">A PHP Error was encountered</h4>

			<p>
				<strong>Severity:</strong> <?php echo $severity; ?><br>
				<strong>Message:</strong> <?php echo $message; ?><br>
				<strong>Filename:</strong> <?php echo $filepath; ?><br>
				<strong>Line Number:</strong> <?php echo $line; ?>
			</p>

			<hr>

			<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE) : ?>

				<h5 class="mb-3">Backtrace:</h5>
				<?php foreach (debug_backtrace() as $error) : ?>

					<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0) : ?>

						<p class="px-3">
							<strong>File:</strong> <?php echo $error['file'] ?><br />
							<strong>Line:</strong> <?php echo $error['line'] ?><br />
							<strong>Function:</strong> <?php echo $error['function'] ?>
						</p>

					<?php endif ?>

				<?php endforeach ?>

			<?php endif ?>

		</div>
	</div>
</div>