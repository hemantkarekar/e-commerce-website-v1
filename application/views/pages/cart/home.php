<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= APP_NAME . " • " .  $page['title'] ?></title>
</head>

<body>
    <header>
        <?php $this->load->view('components/_nav_ecom') ?>
    </header>
    <?php $subtotal = 0; ?>
    <?php $quantity = 0; ?>
    <main class="py-3">
        <div class="container-fluid">
            <div class="row m-0 mb-3">
                <div class="col-xl-9 col-lg-8 col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>Shopping Cart</h5>
                        </div>
                        <div class="card-body">
                            <?php if (count($cart_contents) == 0) : ?>
                                <div class="row m-0">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">

                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-6 col-12">
                                        <h2>Your Cart is Empty</h2>
                                        <p>There are thousands of products waiting for you. <br> Don't keep them waiting much longer. <a href="<?= xss_clean(base_url('products')) ?>">Shop Now</a></p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <?php foreach ($cart_contents as $key => $value) : ?>
                                    <div class="card mb-3">
                                        <?php
                                        // print_r($value);
                                        $subtotal += $value['cart']['subtotal'];
                                        $quantity += $value['cart']['qty'];
                                        ?>
                                        <div class="card-body">
                                            <div class="row m-0">
                                                <div class="col-md-auto col-12">
                                                    <div class="prdct_image">
                                                        <a href="<?= base_url("product/") . random_string() . "/dp/" . $value['product']['product_id'] ?>?ref=product_list"><img src="<?= $value['product']['image'] ?>" alt="<?= $value['product']['name'] ?>" width="100" loading="lazy"></a>
                                                    </div>
                                                </div>
                                                <div class="col-md col-12">
                                                    <div class="row m-0 align-items-center">
                                                        <div class="col-12">
                                                            <h4 class="">
                                                                <a href="<?= base_url("product/") . random_string() . "/dp/" . $value['product']['product_id'] ?>?ref=product_list"><?= $value['product']['name'] ?></a>
                                                            </h4>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <strong><?= number_to_currency($value['cart']['price'], "INR", 2) ?></strong>
                                                        </div>
                                                        <div class="col-md-auto col-12 mb-3">
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="basic-addon1">Qty</span>
                                                                <select class="form-control w-auto" name="quantity[]">
                                                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                                                        <?php if ($i == $value['cart']['qty']) : ?>
                                                                            <option selected value="<?= $i ?>"><?= $i ?></option>
                                                                        <?php else : ?>
                                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                                        <?php endif ?>
                                                                    <?php endfor ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md col-12 mb-3">
                                                            <button type="button" class="btn btn-sm btn-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                </svg>
                                                                Delete
                                                            </button>
                                                            <button type="button" class="btn btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                                    <path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z" />
                                                                </svg>
                                                                Save&nbsp;For&nbsp;Later
                                                            </button>
                                                            <a href="" class="btn btn-sm">See More Like This</a>

                                                            <button type="button" class="btn btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2">
                                                                    <circle cx="18" cy="5" r="3"></circle>
                                                                    <circle cx="6" cy="12" r="3"></circle>
                                                                    <circle cx="18" cy="19" r="3"></circle>
                                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                                                </svg>
                                                                Share
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                        <?php if (count($cart_contents) != 0) : ?>
                            <div class="card-footer">
                                <div class="row justify-content-end">
                                    <div class="col-md-auto col-12">
                                        <h5>Subtotal (<?= $quantity ?> Items) <strong><?= number_to_currency($subtotal, 'INR', 2) ?></strong></h5>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="disclaimer">
                        <small>
                            The price and availability of items at <a href="<?= xss_clean(base_url()) ?>"><?= APP_NAME ?></a> are subject to change. The shopping cart is a temporary place to store a list of your items and reflects each item's most recent price.
                            <br>Do you have a promotional code? We'll ask you to enter your claim code when it's time to pay.
                        </small>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-12">
                    <?php if (count($cart_contents) != 0) : ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <h5>Subtotal (<?= $quantity ?> Items) <strong><?= number_to_currency($subtotal, 'INR', 2) ?></strong></h5>
                                </div>
                                <button type="submit" class="btn btn-primary d-block w-100">Proceed to Buy</button>
                            </div>
                        </div>
                    <?php endif ?>
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