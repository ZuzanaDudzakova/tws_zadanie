<?php

function showNavi($choose)
{
    $titles = array();
    $titles['uvod'] = 'Domov';
    $titles['drama'] = 'Dráma';
    $titles['komedia'] = 'Komédia';

    if (isset($_SESSION['user'])) {
        $titles['kontakt'] = 'Kontakt';
        $titles['shop'] = 'Shop';
    }

    foreach ($titles as $id => $title) {
        if ($choose == $id) {
            echo "<li class='list-group bg-light active'>";
        } else {
            echo "<li>";
        }
        echo '<a href="./?id=' . $id . '" class="nav-link">' . $title . '</a></li></li>';
    }
}
