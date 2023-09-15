<!DOCTYPE html>
<html lang="en">
<?php   ?>
<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= APP_NAME . " • " .  $page['title'] ?></title>
</head>

<body>
    <header>
        <?php $this->load->view('components/_nav_locked') ?>
    </header>
    <?php 
    $subtotal = 0; 
    foreach ($cart_contents['cart'] as $cart) {
        $subtotal += $cart['subtotal'];
    }
    ?>

    <?php $quantity = count($cart_contents['cart']); ?>
    <main class="py-3">
        <div class="container">
            <div class="row m-0 flex-row-reverse">
                <div class="col-xl-3 col-lg-4 col-md-5 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <h4>Subtotal (<?= $quantity ?>)</h4>
                                <h2><?= number_to_currency($subtotal,"INR", 2) ?></h2>
                            </div>
                            <a href="<?= $payment['url'] ?>" class="btn btn-primary">Pay Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-12">
                    <?php
                    echo "<pre>";
                    print_r($cart_contents);
                    echo "</pre>";
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>