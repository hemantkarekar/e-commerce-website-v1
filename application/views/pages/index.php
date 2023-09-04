<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/_head') ?>
    <?php $this->load->view('components/_common_css') ?>
    <title><?= APP_NAME . " • " .  $page['title'] ?></title>
</head>

<body>
    <?php $this->load->view('components/_nav') ?>
    <main>
        <?php select_theme_by_occasion(
            "theme-01",
            $from_datetime = date_create("2023-09-01 15:46:00"),
            $to_datetime = date_create("2023-09-01 15:57:00")
        ) ?>
        Home Page
    </main>
    
    <footer>
        <?php $this->load->view('components/_common_footer') ?>
    </footer>
    <?php $this->load->view('popups/cookie_consent') ?>
    <?php $this->load->view('components/_common_js') ?>
</body>

</html>