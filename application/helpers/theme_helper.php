<?php
function select_theme_by_occasion($theme = "default", DateTime $from_datetime = null, DateTime $to_datetime = null)
{
    // $from_datetime = date_create("2023-09-01 15:46:00");
    // $to_datetime = date_create("2023-09-01 15:47:00");
    $current_datetime = date('U');
    if ((date_format($from_datetime, "U") < $current_datetime) && ($current_datetime < date_format($to_datetime, "U"))) {
        switch ($theme) {
            case 'theme-01':
                echo "<link rel='stylesheet' href=" . base_url("assets/css/theme-01.min.css") . ">";
                break;

            default:
                echo "<link rel='stylesheet' href=" . base_url("assets/css/style.min.css") . ">";
                # code...
                break;
        }
    }
}
