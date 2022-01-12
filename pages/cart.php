<?php
session_start();
include('config/connect.php');
$nadpis = 'Your cart';

$celk_cena = 0;

function replace_char($str)
{
  $str = str_replace('|', ' | ', $str);
  $str = str_replace(',', ' | ', $str);
  return $str;
}

if(isset($_POST['zrus'])){
  unset($_SESSION['cart']);
}

?>

<section id="card">
  <h2><?php echo $nadpis; ?></h2>
  <?php
  if (isset($_SESSION['cart'])) {
    $celk_cena = 0;
  ?>
</section>
<h3>In your cart:</h3>

<form method="post" class="form_kosik">
  <input type="submit" name="zrus" value="Zruš obsah košíka" class="odosli_velke">
</form>

<div class="row row-cols-1 row-cols-md-4 g-4">
  <?php
    foreach ($_SESSION['cart'] as $id => $pocet) {
      $select = $conn->prepare('SELECT * FROM products WHERE id=?');
      $select->bind_param('i', $pocet);
      $select->execute();
      $vysledok = $select->get_result();
      $row = $vysledok->fetch_assoc();
      $select->close();
      $celk_cena += $row['price'];
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
      </div>
  </div></div>';
    }
  ?>
</div>
<h3>Total: <?php echo $celk_cena; ?>€</h3>
<?php
  } else {
    echo "<p>Your card is empty</p>";
  }
?>