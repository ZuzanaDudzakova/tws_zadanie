<?php

session_start();

function showNav($choose)
{
    $titles = array();
    $titles['uvod'] = 'Home';
    $titles['drama'] = 'Drama';
    $titles['komedia'] = 'Comedy';
    $titles['shop'] = 'Shop';
    $titles['cart'] = 'Cart';

    if (isset($_SESSION['user'])) {
        $titles['kontakt'] = 'Contacts';
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
