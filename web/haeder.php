<?php

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $_SESSION['rank']='3';

?>

<nav class="col-12 navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a href="#"><img class="img-nav" src="../images/rols/git.png" alt=""></a>
<?php if($_SESSION['rank']=='1'||$_SESSION['rank']=='2'||$_SESSION['rank']=='3'){?>
  <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="home.php">School</a>
        </li>
        <?php if($_SESSION['rank']!=='3'){?>
          <li class="nav-item">
            <a class="nav-link" href="#">Administrator</a>
          </li>
        <?php }?>
      </ul>
  </div>
  <div>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Name</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Type</a>
        </li>
        <li >
          <a href="#"><img class="img-nav" src="../images/rols/git.png" alt=""></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
  </div>
<?php }?>
</nav>