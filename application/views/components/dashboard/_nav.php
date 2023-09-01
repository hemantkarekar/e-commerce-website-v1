<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('') ?>"><img src="<?= base_url() ?>assets/logo.png" alt="Logo Image" style="height: 40px;">&nbsp;<span class="d-none d-md-inline">Dashboard</span></a>
        <!-- <a class="navbar-brand" href="<?= base_url('trl-admin') ?>">Dashboard</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between w-100" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>">Home</a>
                <button type="button" class="nav-link search" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    &nbsp;
                    Search in Dashboard
                </button>
            </div>
            <div class="navbar-nav">
                <?php if ($this->session->user['role'] == "admin") : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('currency/all') ?>">Localization</a>
                    </li>
                <?php endif ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Notifications
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $this->session->user['username'] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="px-3">
                                <?= $this->session->user['username'] ?>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Messages</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <a class="dropdown-item text-danger d-flex justify-content-between" href="<?= base_url('logout') ?>">
                                Logout
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><?= $this->session->user['username'] ?></a>
                </li>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php load_menu($menu['users'], $menu['users']['type'],$menu['users']['enable']) ?>
                <?php load_menu($menu['master'], $menu['master']['type'],$menu['master']['enable']) ?>
                <?php load_menu($menu['categories'], $menu['categories']['type'],$menu['categories']['enable']) ?>
                <?php load_menu($menu['orders-invoices'], $menu['orders-invoices']['type'],$menu['orders-invoices']['enable']) ?>
                <?php load_menu($menu['reviews'], $menu['reviews']['type'],$menu['reviews']['enable']) ?>
                <?php load_menu($menu['brands'], $menu['brands']['type'],$menu['brands']['enable']) ?>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="search" method="get">
                    <div class="row m-0">
                        <div class="col-md col-12">
                            <input type="search" class="form-control" name="s" id="inputSearch">
                        </div>
                        <div class="col-md-auto col-12">
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>