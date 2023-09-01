<div class="container mb-3">
    <!-- If User is not Signed In -->
    <?php if (!$this->session->has_userdata('user')) : ?>
        <div class="sign-in">
            <div class="row g-0 justify-content-center">
                <div class="col-xl-6 col-md-8 col-10">
                    <div class="text-center">
                        <p>See Personalised Recommendations</p>
                        <a href="<?= xss_clean(base_url('login')) ?>" class="btn btn-sm btn-primary mb-2">Sign&nbsp;In</a>
                        <p><small>New Customer?&nbsp;<a href="<?= xss_clean(base_url('register')) ?>">Start Here</a></small></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    <!-- END -->
</div>
<div class="py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?= date("Y") ?> &copy;Electrocare&nbsp;India, Powered&nbsp;by&nbsp;<a href=""><?= APP_NAME ?></a>.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Designed &amp; Developed by <!-- <a href="#" target="_blank" class="link">Hemant Karekar</a> from  --><a href="#" target="_blank" class="link">Sociomark</a>
                </div>
            </div>
        </div>
    </div>
</div>