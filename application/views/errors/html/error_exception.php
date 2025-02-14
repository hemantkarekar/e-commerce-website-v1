<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container mt-3">
	<div class="card">
		<div class="card-body">

			<h4>An uncaught Exception was encountered</h4>

			<p>Type: <?php echo get_class($exception); ?></p>
			<p>Message: <?php echo $message; ?></p>
			<p>Filename: <?php echo $exception->getFile(); ?></p>
			<p>Line Number: <?php echo $exception->getLine(); ?></p>

			<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE) : ?>

				<p>Backtrace:</p>
				<?php foreach ($exception->getTrace() as $error) : ?>

					<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0) : ?>

						<p style="margin-left:10px">
							File: <?php echo $error['file']; ?><br />
							Line: <?php echo $error['line']; ?><br />
							Function: <?php echo $error['function']; ?>
						</p>
					<?php endif ?>

				<?php endforeach ?>

			<?php endif ?>

		</div>
	</div>
</div>