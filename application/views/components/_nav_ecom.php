<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand bg-nav-sprite brand-logo" href="<?= base_url() ?>"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100 justify-content-between" id="navbarNav">
            <ul class="navbar-nav gap-2 align-items-center">
                <li class="nav-item">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropAddress">Deliver&nbsp;to&nbsp;India</button>
                </li>
                <li class="nav-item w-100">
                    <form class="input-group nav-search" role="search" action="<?= base_url("search") ?>" method="get">
                        <select class="input-group-text" name="cat" id="">
                            <option value="all">All</option>
                        </select>
                        <input class="form-control" name="sk" value="<?= ($this->input->get("sk")!= null)? $this->input->get("sk"): ""  ?>" type="search" placeholder="Search" aria-label="Search">
                        <button class="input-group-text bg-primary" type="submit">S</button>

                    </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li> -->
                <li class="nav-item" id="google_translate_element">
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accounts
                    </a>
                    <ul class="dropdown-menu">
                        <?php if ($this->session->has_userdata('user')) : ?>
                            <li><a class="dropdown-item" href="<?= xss_clean(base_url($this->session->userdata('user')['username'] . "/account")) ?>"><?= xss_clean($this->session->userdata('user')['username']) ?></a></li>
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
                                <a class="dropdown-item text-danger d-flex justify-content-between" href="<?= base_url('logout')?>">
                                    Logout
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                </a>
                            </li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="<?= xss_clean(base_url('login')) ?>">Login</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Return&nbsp;&&nbsp;Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("cart") ?>">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg bg-dark-accent p-0">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#"></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars me-2"></i>All
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Today's Deal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Customer Service</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= (base_url("") == current_url()) ? "active" : "" ?>" <?= (base_url("") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("") ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (base_url("products") == current_url()) ? "active" : "" ?>" <?= (base_url("products") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("products") ?>">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (base_url("about-us") == current_url()) ? "active" : "" ?>" <?= (base_url("about-us") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("about-us") ?>">About&nbsp;Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (base_url("services") == current_url()) ? "active" : "" ?>" <?= (base_url("services") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("services") ?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (base_url("contact-us") == current_url()) ? "active" : "" ?>" <?= (base_url("contact-us") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("contact-us") ?>">Contact&nbsp;Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Hello,&nbsp;<a href="<?= ($this->session->has_userdata('user')) ? base_url($user['username'] . "/account") : base_url('login') ?>"><?= ($this->session->has_userdata('user')) ? $user['username'] : "Sign In" ?></a></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdropAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>