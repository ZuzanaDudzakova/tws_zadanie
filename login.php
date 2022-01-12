<?php

session_start();
include('config/connect.php');
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
                            $select->close();
                            $_SESSION['user'] = $_POST['login'];
                            header('Location: index.php');
                            exit();
                        }
                    }
                }
            }
        }
        $select->close();
    }
}


?>
<style>
  #regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}
</style>
<div class="container my-3" >
<form id="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" method="post">
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
</div>
