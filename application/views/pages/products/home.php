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
                <?php for ($i = 1; $i < 5; $i++) : ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a class="card mb-3" href="">
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
                        <a class="card mb-3" href="">
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