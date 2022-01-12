<?php
include('../config/connect.php');

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
        <h1 class="display-5 fw-bold">Movie sales</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus laborum consequuntur illum ipsam suscipit placeat?</p>
    </div>
</div>
<div class="">
    <h1 class="my-4 text-center">Najpredavanejšie</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['id'] > 4) {
                    break;
                } else {
                    echo '<div class="col col-sm"><div class="card mr-4 h-100" style="width: 20rem;">
                        <img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['product'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['product'] . '</h5>
                            <p class="card-text">' . $row['description'] . '</p>
                            <div class="mb-0 m-auto pb-0">
                                <p class="card-text"><small class="text-muted">' . replace_char($row['genders']) . '</small></p>
                                <p class="card-text">Author: <small class="text-muted">' . $row['autor'] . '</small></p>
                                <a href="./?id=shop" class="btn btn-primary">Kúpiť</a>
                            </div>
                        </div>
                    </div></div>';
                }
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>
<div class="text-center p-4 mt-4 bg-dark" style="color: white;">
    <h1>Lorem ipsum dolor sit amet</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus laborum consequuntur illum ipsam suscipit placeat? Laborum, saepe voluptas aspernatur temporibus neque, nobis libero, voluptates assumenda tenetur harum inventore explicabo vel.</p>
    <div class="text-center block mx-auto"><button type="button" class="btn btn-primary">Kupit</button></div>
</div>
<div class="container mx-auto">
    <h1 class="my-4 text-center">Najpozerajnejšie</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['id'] < 5 || $row['id'] > 9) {
                    break;
                } else {
                    echo '<div class="col col-sm"><div class="card mr-4 h-100" style="width: 20rem;">
                        <img src="' . $row['img'] . '" class="card-img-top" alt="' . $row['product'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['product'] . '</h5>
                            <p class="card-text">' . $row['description'] . '</p>
                            <div class="mb-0 m-auto pb-0">
                                <p class="card-text"><small class="text-muted">' . replace_char($row['genders']) . '</small></p>
                                <p class="card-text">Author: <small class="text-muted">' . $row['autor'] . '</small></p>
                                <a href="./?id=shop" class="btn btn-primary">Kúpiť</a>
                            </div>
                        </div>
                    </div></div>';
                }
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>