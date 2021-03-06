<?php
include('config/connect.php');
//make select from products table where category regrex drama
$sql = "SELECT * FROM products WHERE genders REGEXP 'drama'";
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
        <h1 class="display-5 fw-bold">Movie sales | Drama</h1>
    </div>
</div>
<h1 class="my-4 text-center">Drama category</h1>
<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
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
    } else {
        echo "0 results";
    }
    ?>
</div>