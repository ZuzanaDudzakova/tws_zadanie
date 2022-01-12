<?php

session_start();
include('connect.php');
include('header.php');
include('navigation.php');
showNav("nic");
include('prihlasenie.php');

if (isset($_POST['login']) && isset($_POST['password'])) {
    $select = $conn->prepare('SELECT password, active FROM users WHERE login=?');
    if (!$select) {
        echo '<div class="alert alert-danger" role="alert">Syntaktická chyba</div>';
    } else {
        $ok = $select->bind_param("s", $_POST['login']);

        if (!$ok) {
            echo '<div class="alert alert-danger" role="alert">Neprijateľný login</div>';
        } else {
            $ok2 = $select->execute();
            if (!$ok2) {
                echo '<div class="alert alert-danger" role="alert">Problém pri vykonaní dopytu v databáze!!!</div>';
            } else {
                $vysledok = $select->get_result();
                if ($vysledok->num_rows != 1) {
                    echo '<div class="alert alert-danger" role="alert"> Nenájdený používateľ!!! </div>';
                } else {
                    $riadok = $vysledok->fetch_assoc();
                    if ($riadok['active'] != 1) {
                        echo '<div class="alert alert-warning" role="alert">Používateľ je neaktívny</div>';
                    } else {
                        if ($_POST['password'] != $riadok['password']) {
                            echo '<div class="alert alert-warning" role="alert">Nesprávne heslo!!!</div>';
                        } else {
                            echo '<div class="alert alert-warning" role="alert">Fungujem?</div>';
                            $select->close();
                            $_SESSION['user'] = $_POST['login'];
                            // header('Location: index.php');
                            // exit();
                        }
                    }
                }
            }
        }
        $select->close();
    }
}


?>

<div class="container my-3" >
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" method="post">
  <div class="form-group my-3">
    <label for="login">Username:</label>
    <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="login" placeholder="Enter username" name="login" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback"><?php echo $username_err; ?></div>
  </div>
  <div class="form-group my-3">
    <label for="password">Password:</label>
    <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" placeholder="Enter password" name="password" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback"><?php echo $password_err; ?></div>
  </div>
  <div class="form-group form-check my-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember" required> I agree on saving my personal informations.
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Check this checkbox to continue.</div>
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Log in</button>
</form>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script> 
</div>
