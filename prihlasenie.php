</ul>
<ul class="navbar-nav ms-auto">
    <?php
    if(isset($_SESSION['user']))
    {
    ?>
        <li style="text-align: center; margin-top: 3.5%;"><span class="navbar-text"><?php echo $_SESSION['user'] ?></span></li>
        <li><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    <?php 
    }else 
    {
    ?>
        <li><a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        <li><a href="registration.php" class="nav-link">Registration</a></li>
    <?php
    }
    ?>
</ul>
</div>
</div>
</nav>
</header>
<div class="container">