<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand brand-logo" href="<?= base_url('') ?>">
        </a>
        <!-- <a class="navbar-brand" href="<?= base_url('') ?>"><?= APP_NAME ?></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100 justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled <?= (base_url("") == current_url()) ? "active" : "" ?>" <?= (base_url("") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("") ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if ($this->session->has_userdata('user')) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= (base_url( $this->session->userdata('user')['username'] .  "/account") == current_url()) ? "active" : "" ?>" <?= (base_url( $this->session->userdata('user')['username'] .  "/account") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url( $this->session->userdata('user')['username'] .  "/account") ?>"><?= $this->session->userdata('user')['username']?></a>
                    </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link <?= (base_url("login") == current_url()) ? "active" : "" ?>" <?= (base_url("login") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("login") ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (base_url("register") == current_url()) ? "active" : "" ?>" <?= (base_url("register") == current_url()) ? 'aria-current="page"' : "" ?> href="<?= base_url("register") ?>">Register</a>
                        </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>