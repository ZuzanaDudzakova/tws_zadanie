<?php
include('config/connect.php');


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

function replace_char($str)
{
    $str = str_replace('|', ' | ', $str);
    $str = str_replace(',', ' | ', $str);
    return $str;
}

?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Predaj filmov | Kontakt</h1>
    </div>
</div>