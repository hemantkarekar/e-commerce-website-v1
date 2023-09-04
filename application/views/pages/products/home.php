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
                <div class="col-12">
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
                <?php for ($i = 1; $i < 4; $i++) : ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Offer Sale 0<?= $i ?></h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                <?php endfor ?>
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4>Best Selling Products</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>New Arrivals</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                <?php for ($i = 1; $i < 5; $i++) : ?>
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>{category <?= $i ?>}</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                <?php endfor ?>
                <?php for ($i = 1; $i < 5; $i++) : ?>
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>{brand <?= $i ?>}</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
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