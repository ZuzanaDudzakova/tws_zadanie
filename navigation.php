<?php

session_start();

function showNav($choose)
{
    $titles = array();
    $titles['uvod'] = 'Domov';
    $titles['drama'] = 'Dráma';
    $titles['komedia'] = 'Komédia';
    $titles['shop'] = 'Shop';

    if (isset($_SESSION['user'])) {
        $titles['kontakt'] = 'Kontakt';
    }

    foreach ($titles as $id => $title) {
        if ($choose == $id) {
            echo "<li class='list-group text-body bg-light active '>";
        } else {
            echo "<li>";
        }
        echo '<a href="./?id=' . $id . '" class="nav-link">' . $title . '</a></li></li>';
    }
}
