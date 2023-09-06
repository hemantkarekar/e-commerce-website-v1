<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= APP_NAME . " • " .  $page['title'] ?></title>
</head>

<body>
    <?php $this->load->view('components/_nav_ecom') ?>
    <main>
        <?php select_theme_by_occasion(
            "theme-01",
            $from_datetime = date_create("2023-09-01 15:46:00"),
            $to_datetime = date_create("2023-09-01 15:57:00")
        ) ?>

        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="mb-3">
                        <a href="<?= base_url("product/") . random_string() . "/dp/". "RBTyOSgVDd4ukeCsXQAl9I7wF0LKWr2M?ref=featured_products_home"?>" target="_blank">
                            <img class="w-100" src="<?= base_url() ?>assets/uploads/cd59c96a-308c-48dd-8dd5-fb8103990f83.__CR0,0,1464,600_PT0_SX1464_V1___.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="banner__section py-5">
                        <div class="row m-0 g-0 justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                                <div class="text-center">
                                    <div class="title">
                                        <h1>Lorem ipsum dolor sit amet.</h1>
                                    </div>
                                    <div class="desc">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat fuga voluptatum omnis id ad eaque mollitia consequatur debitis corrupti aut maxime, excepturi, alias consectetur quidem?
                                        </p>
                                        <a href="" class="btn btn-lg btn-primary">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3 ">
                    <div class="card h-100">
                        <div class="card-header">
                            <strong>Offer Sale</strong>
                        </div>
                        <div class="card-body">
                            <div class="row m-0">
                                <div class="col-md-auto col-12">
                                    <a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $products['offer_01']['product_id']) ?>?ref=featured_products_home" target="_blank">
                                        <div class="tile_image square">
                                            <img src="<?= $products['offer_01']['image'] ?>" alt="<?= $products['offer_01']['name'] ?>">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md col-12">
                                    <a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $products['offer_01']['product_id']) ?>?ref=featured_products_home" target="_blank"><?= $products['offer_01']['name'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <strong>Offer Sale</strong>
                        </div>
                        <div class="card-body">
                            <div class="row m-0">
                                <div class="col-md-auto col-12">
                                    <a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $products['offer_02']['product_id']) ?>?ref=featured_products_home" target="_blank">
                                        <div class="tile_image square">
                                            <img src="<?= $products['offer_02']['image'] ?>" alt="<?= $products['offer_02']['name'] ?>">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md col-12">
                                    <a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $products['offer_02']['product_id']) ?>?ref=featured_products_home" target="_blank"><?= $products['offer_02']['name'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <strong>Offer Sale</strong>
                        </div>
                        <div class="card-body">
                            <div class="row m-0">
                                <div class="col-md-auto col-12">
                                    <a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $products['offer_03']['product_id']) ?>?ref=featured_products_home" target="_blank">
                                        <div class="tile_image square">
                                            <img src="<?= $products['offer_03']['image'] ?>" alt="<?= $products['offer_03']['name'] ?>">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md col-12">
                                    <a href="<?= xss_clean(base_url("product/") . random_string() . "/dp/" . $products['offer_03']['product_id']) ?>?ref=featured_products_home" target="_blank"><?= $products['offer_03']['name'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Best Selling Products</strong>
                        </div>
                        <div class="card-body">
                            <div class="row m-0">
                                <?php foreach ($products['featured'] as $featured) : ?>
                                    <div class="col-lg-3 col-md-6 col-12 mb-3">
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
                <div class="col-md-6 col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>New Arrivals</strong>
                        </div>
                        <div class="card-body">
                            <div class="row m-0">
                                <?php foreach ($products['arrivals'] as $featured) : ?>
                                    <div class="col-lg-3 col-md-6 col-12 mb-3">
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
                <?php for ($i = 1; $i < 5; $i++) : ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="" class="card mb-3">
                            <div class="card-header">
                                <strong>{category <?= $i ?>}</strong>
                            </div>
                            <div class="card-body">

                            </div>
                        </a>
                    </div>
                <?php endfor ?>
                <?php for ($i = 1; $i < 5; $i++) : ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="" class="card mb-3">
                            <div class="card-header">
                                <strong>{brand <?= $i ?>}</strong>
                            </div>
                            <div class="card-body">

                            </div>
                        </a>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </main>

    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>