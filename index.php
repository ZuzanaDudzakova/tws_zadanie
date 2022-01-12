<?php
session_start();
$pages = array('uvod', 'drama', 'komedia', 'shop', 'kontakt');
$show = 'uvod';

if (isset($_GET['id']) && in_array($_GET['id'], $pages)) 
{
    $show = $_GET['id'];
}

include('config/connect.php');

include('header.php');
include('navigation.php');
showNav($show);
include('prihlasenie.php');
include('pages/' . $show . '.php');
include('footer.php');