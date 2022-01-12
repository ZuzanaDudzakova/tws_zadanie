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

if (isset($_POST['addCart'])) {
    $_SESSION['cart'][] = $_POST['addCart'];
}


?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Movie sales | Shop</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus laborum consequuntur illum ipsam suscipit placeat?</p>
    </div>
</div>
<div class="">
    <h1 class="my-4 text-center">Najpredavanejšie</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col"><div class="card mr-4 h-100" style="width: 20rem;">
                    <img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['product'] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['product'] . '</h5>
                        <p class="card-text">' . $row['description'] . '</p>
                        <div class="row">
                        <p class="card-text col-8"><small class="text-muted">' . replace_char($row['genders']) . '</small></p>
                        <p class="card-text col-4">' . $row['price'] . '&euro;</p>
                        <p class="card-text">Author: <small class="text-muted">' . $row['autor'] . '</small> </br>
                        Length: <small class="text-muted">' . $row['length'] . '</small>min </br>
                        Year of publication: <small class="text-muted">' . $row['year_of_publication'] . '</small>
                        </p>
                        </div>
                        <div class="text-center my-2 block mx-auto"><form action="./?id=shop" method="post"><button type="submit" name="addCart" value=' . $row['id'] . ' class="btn btn-primary btn-lg px-5">Pridať do košíka</button></form></div>
                    </div>
                </div></div>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>