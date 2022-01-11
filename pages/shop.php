<?php
include('config/connect.php');

include('header.php');
include('navigation.php');
showNavi("nic");

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

function replace_char($str)
{
    $str = str_replace('|', ' | ', $str);
    $str = str_replace(',', ' | ', $str);
    return $str;
}

?>
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Predaj filmov | Shop</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus laborum consequuntur illum ipsam suscipit placeat?</p>
            </div>
        </div>
        <div class="">
            <h1 class="my-4 text-center">Najpredavanejšie</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col"><div class="card mr-4" style="width: 20rem;">
                    <img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['product'] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['product'] . '</h5>
                        <p class="card-text">' . $row['description'] . '</p>
                        <div class="row">
                        <p class="card-text col-8"><small class="text-muted">' . replace_char($row['genders']) . '</small></p>
                        <p class="card-text col-4">' .$row['autor'] . ' </p>
                        <p class="card-text col-4">' . $row['price'] . '&euro;</p>
                        </div>
                        <div class="text-center block mx-auto"><a href="#" class="btn btn-primary btn-lg px-5">Pridať do košíka</a></div>
                    </div>
                </div></div>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </div>
    </div>