<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function load_menu($menu, $type, $enable, $parent_type = "single")
// Array ( [enable] => 1 [type] => single [text] => Categories [url] => categories ) Single
// Array ( [enable] => 1 [type] => dropdown [orders] => Array ( [enable] => 1 [type] => single [text] => All Orders [url] => orders ) [invoices] => Array ( [enable] => 1 [type] => single [text] => All Invoices [url] => invoices ) ) Dropdown
{
    if ($enable) {
        switch ($type) {
            case 'dropdown':
                # code...
                echo "
                <li class='nav-item dropdown'>" .
                    "<a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>" .
                    $menu['text'] .
                    "</a>
                    <ul class='dropdown-menu'>";
                foreach ($menu['dropdown'] as $menuItem) {
                    load_menu($menuItem, $menuItem['type'], $menuItem['enable'], 'dropdown');
                }
                echo "</ul>
                </li>";
                break;

            default:
                # code...
                if ($parent_type == 'dropdown') {
                    echo "<li><a class='dropdown-item' href='" . base_url($menu['url']) . "'>" . $menu['text'] . "</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='" . base_url($menu['url']) . "'>" . $menu['text'] . "</a>
                </li>";
                }
                break;
        }
    }
}
