<section class="page-title <?= $property['class'] ?>">
    <div class="row m-0 justify-content-between align-items-center">
        <div class="col-md col-12">
            <?php foreach ($breadcrumb as $key => $value) : ?>
                <?php if ($value == 'Current') : ?>
                    <h1><?= $key ?></h1>
                <?php endif ?>
            <?php endforeach ?>
        </div>
        <div class="col-md-auto col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php foreach ($breadcrumb as $key => $value) : ?>
                        <?php if ($value == 'Current') : ?>
                            <li class="breadcrumb-item active" aria-current="page"><?= $key ?></li>
                        <?php else : ?>
                            <li class="breadcrumb-item"><a href="<?= base_url($value) ?>"><?= $key ?></a></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ol>
            </nav>

        </div>
    </div>


</section>