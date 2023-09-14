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
    <main id="productList">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-lg-3 col-12 mb-3">
                    <div class="categories_filters py-3 pt-0">
                        <ul class="list-unstyled pt-3">
                            <li>
                                <strong>Popular Shopping Ideas</strong>
                            </li>
                            <li><a href="">Portable</a></li>
                            <li><a href="">Wood</a></li>
                            <li><a href="">Animal</a></li>
                            <li><a href="">Ceiling</a></li>
                        </ul>

                        <fieldset class="fltr_group">
                            <legend><strong>Category</strong></legend>
                            <ul id="tree1">
                                <li data-node-id="1">
                                    <span class=""><a href="">Electronics</a></span>
                                    <ul>
                                        <li data-node-id="1.1">
                                            <span class=""><a href="" class="">Mobiles & Accessories</a></span>
                                            <ul>
                                                <li data-node-id="1.1.1">
                                                    <span class=""><a href="" class="">Smartphones & Basic Mobiles</a></span>
                                                    <ul>
                                                        <li data-node-id="1.1.1.1">
                                                            <span class="active">Smartphones</span>
                                                        </li>
                                                        <li data-node-id="1.1.1.2">
                                                            <span class="">Basic Mobiles</span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <script>
                                $(document).ready(() => {
                                    $('#tree1').simpleTree();
                                });
                            </script>
                        </fieldset>
                        <form action="" method="get">
                            <div class="filter_apply_btn py-3">
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                            </div>
                            <fieldset class="fltr_group">
                                <legend><strong>Delivery Day</strong></legend>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckGetItbyTomorrow">
                                            <label class="form-check-label" for="flexCheckGetItbyTomorrow">
                                                Get It by Tomorrow
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckGetItby2days">
                                            <label class="form-check-label" for="flexCheckGetItby2days">
                                                Get It in 2 Days
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </fieldset>
                            <?php for ($j = 0; $j < 5; $j++) : ?>
                                <fieldset class="fltr_group">
                                    <legend><strong>Category <?= $j ?></strong></legend>
                                    <ul class="list-unstyled">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckBrandName<?= $j . $i ?>">
                                                    <label class="form-check-label" for="flexCheckBrandName<?= $j . $i ?>">
                                                        Brand Name <?= $j . $i ?>
                                                    </label>
                                                </div>
                                            </li>

                                        <?php endfor ?>
                                    </ul>
                                </fieldset>
                            <?php endfor ?>

                            <fieldset class="fltr_group">
                                <legend><strong>Customer Reviews</strong></legend>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCustReview4">
                                            <label class="form-check-label" for="flexCheckCustReview4">
                                                4 Stars & Up & Up
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCustReview3">
                                            <label class="form-check-label" for="flexCheckCustReview3">
                                                3 Stars & Up & Up
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCustReview2">
                                            <label class="form-check-label" for="flexCheckCustReview2">
                                                2 Stars & Up & Up
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCustReview1">
                                            <label class="form-check-label" for="flexCheckCustReview1">
                                                1 Star & Up & Up
                                            </label>
                                        </div>

                                    </li>
                                </ul>
                            </fieldset>

                            <fieldset class="fltr_group">
                                <legend><strong>Price</strong></legend>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckPriceU1000">
                                            <label class="form-check-label" for="flexCheckPriceU1000">
                                                Under &#8377;1,000
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckPrice15">
                                            <label class="form-check-label" for="flexCheckPrice15">
                                                &#8377;1,000 - &#8377;5,000
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckPrice510">
                                            <label class="form-check-label" for="flexCheckPrice510">
                                                &#8377;5,000 - &#8377;10,000
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckPrice1020">
                                            <label class="form-check-label" for="flexCheckPrice1020">
                                                &#8377;10,000 - &#8377;20,000
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckPrice20U">
                                            <label class="form-check-label" for="flexCheckPrice20U">
                                                Over &#8377;20,000
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <!-- &#8377; Min  - &#8377; Max Go -->
                            </fieldset>
                            <fieldset class="fltr_group">
                                <legend><strong>Deals & Discounts</strong></legend>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDiscAll">
                                            <label class="form-check-label" for="flexCheckDiscAll">
                                                All Discounts
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDeal">
                                            <label class="form-check-label" for="flexCheckDeal">
                                                Today's Deals
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </fieldset>



                            Pay On Delivery

                            Eligible for Pay On Delivery

                            New Arrivals
                            Last 30 days
                            Last 90 days
                            Item Condition
                            New
                            Renewed
                            Discount
                            10% Off or more
                            25% Off or more
                            35% Off or more
                            50% Off or more
                            60% Off or more
                            70% Off or more
                            Availability

                            Include Out of Stock

                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="row m-0 py-3">
                        <div class="col-12">
                            <h5>Total <?= $products['results']['count'] ?> Results</h5>
                        </div>
                        <div class="pagination">
                            <?= $products['pagination'] ?>
                        </div>
                        <?php foreach ($products['data'] as $product) : ?>
                            <div class="col-12 mb-3 g-0">
                                <div class="card product h-100">
                                    <div class="card-body">
                                        <div class="row m-0">
                                            <div class="col-md-auto col-12">
                                                <div class="prdct_image">
                                                    <img src="<?= xss_clean($product['image']) ?>" alt="<?= xss_clean($product['name']) ?>" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="col-md col-12">
                                                <h4 class="prdct_name"><a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $product['product_id']) ?>?ref=product_list" target="_blank"><?= xss_clean($product['name']) ?></a></h4>
                                                <div class="prdct_ratings">
                                                    <?= $product['ratings'] ?><i class="fa-solid fa-star mx-2"></i>
                                                    <a href=""><?= $product['ratings_count'] ?></a>
                                                </div>
                                                <div class="prdct_price">
                                                    <?php if ($product['discount_price'] == "") : ?>
                                                        <h4><sup>&#8377;</sup><?= xss_clean(number_to_amount($product['actual_price'], 0)) ?></h4>
                                                    <?php else : ?>
                                                        <h4><sup>&#8377;</sup><?= xss_clean(number_to_amount($product['discount_price'], 0)) ?></h4>&nbsp;<?= xss_clean(number_to_currency($product['actual_price'], "INR", 0)) ?>
                                                    <?php endif ?>
                                                    <div class="prdct_extra_off">
                                                        <div class="text-muted"><span class="badge badge-coupon">Save 10&percnt; with Coupon</span>&nbsp;Save extra with No Cost EMI</div>
                                                    </div>
                                                    <div class="prdct_shipping">
                                                        <small class="text-muted">
                                                            <?php
                                                            $date=date_create("today");
                                                            date_modify($date,"+5 days");
                                                            ?>
                                                            FREE delivery <strong><?= date_format($date,"D j F") ?></strong> <br>
                                                            Or fastest delivery <strong>Tomorrow, <?= date("j F") ?></strong>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <div class="pagination">
                            <?= $products['pagination'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('components/_common_js') ?>
    <script src="<?= base_url() ?>assets/js/@kanety/jquery-simple-tree/dist/jquery-simple-tree.js"></script>
</body>

</html>