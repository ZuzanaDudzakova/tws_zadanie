<?php
session_start();
$nadpis = 'Your card';
include('header.php');
include('navigation.php');
?>


<section id="card">
  <h2><?php echo $nadpis; ?></h2>
  <?php
  if (isset($_SESSION['card'])) 
  {
    $celk_cena = 0;


  ?>
</section>
<h3>In your card:</h3>

<form method="post" class="form_kosik">
  <input type="submit" name="zrus" value="Zruš obsah košíka" class="odosli_velke">
</form>

<?php
    echo "<ol>";
    foreach($_SESSION['card'] as $id => $pocet)
    {
      $select = $conn->prepare('SELECT * FROM products WHERE id=?');
      $select->bind_param('i', $id);
      $select->execute();
      $vysledok = $select->get_result();
      $riadok = $vysledok->fetch_assoc();
      $select->close();
      $celk_cena += $riadok['price'] * $pocet;
      echo "<li>";
      echo $riadok['name'] . " x " . $pocet . " = " . $riadok['price'] * $pocet . "€";
      echo "</li>";
    }
  echo "</ol>"
?>
<h3>Total: <?php echo $celk_cena; ?>€</h3>
<?php
  }
  else
  {
    echo "<p>Your card is empty</p>";
  }
?>
