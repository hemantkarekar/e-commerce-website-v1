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
    <main>
        <section class="py-3">
            <div class="container">
                <div class="py-2">
                    <div class="page__title">
                        <h1>Your Account </h1>
                    </div>
                </div>
                <div class="row m-0 mb-3">
                    <!-- Your Orders -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <a href="<?= xss_clean(base_url("contact-us?ref=acpg_opt_tile")) ?>" class="card-body">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-auto col-12">
                                        <img src="" alt="" style="width: 50px; aspect-ratio:1;">
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="">
                                            <h4>Your Orders</h4>
                                            <p>
                                                Track, Return, or Buy Things Again
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Login & Security -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <a href="<?= xss_clean(base_url("contact-us?ref=acpg_opt_tile")) ?>" class="card-body">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-auto col-12">
                                        <img src="" alt="" style="width: 50px; aspect-ratio:1;">
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="">
                                            <h4>Login & Security</h4>
                                            <p>
                                                Edit Login Name & Mobile Number
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Your Addresses -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <a href="<?= xss_clean(base_url("contact-us?ref=acpg_opt_tile")) ?>" class="card-body">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-auto col-12">
                                        <img src="" alt="" style="width: 50px; aspect-ratio:1;">
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="">
                                            <h4>Your Addresses</h4>
                                            <p>
                                                Edit Addresses for Orders & Gifts
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Payment Options -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <a href="<?= xss_clean(base_url("contact-us?ref=acpg_opt_tile")) ?>" class="card-body">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-auto col-12">
                                        <img src="" alt="" style="width: 50px; aspect-ratio:1;">
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="">
                                            <h4>Payment Options</h4>
                                            <p>
                                                Edit or Add Payment Options
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Contact Us -->
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <a href="<?= xss_clean(base_url("contact-us?ref=acpg_opt_tile")) ?>" class="card-body">
                                <div class="row m-0 align-items-center">
                                    <div class="col-md-auto col-12">
                                        <img src="" alt="" style="width: 50px; aspect-ratio:1;">
                                    </div>
                                    <div class="col-md col-12">
                                        <div class="">
                                            <h4>Contact Us</h4>
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="row m-0">
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <ul class="nav flex-column py-3">
                                <li class="nav-item">
                                    <strong class="px-3">Email Alerts , Messages & Ads</strong>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Advertising Preferences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Communication Preferences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Alert Preferences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Deals Notifications</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <ul class="nav flex-column py-3">
                                <li class="nav-item">
                                    <strong class="px-3">More Ways to Pay</strong>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Default Purchase Settings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Bank Accounts for Refunds</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Coupons</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <ul class="nav flex-column py-3">
                                <li class="nav-item">
                                    <strong class="px-3">Subscriptions</strong>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Memberships & Subscriptions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card h-100">
                            <ul class="nav flex-column py-3">
                                <li class="nav-item">
                                    <strong class="px-3">Data & Privacy</strong>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Request Your Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Close Your Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-0" href="#">Privacy Note</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>