<?php

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
?>

<nav class="col-12 navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a href="#"><img class="img-nav" src="images/rols/logo.png" alt=""></a>
<?php if($_SESSION['rank']==1||$_SESSION['rank']==2||$_SESSION['rank']==3){?>
  <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get" >
              <button name="schoolHome" class="ml-1 nav-link btn-light">School</button>
            </form>        </li>
        <?php if($_SESSION['rank']!==3){?>
          <li class="nav-item">
            <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get" >
              <button name="AdministratorHome" class="ml-2 nav-link btn-light">Administrator</button>
            </form>
          </li>
        <?php }?>
      </ul>
  </div>

  <div>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $_SESSION['name']?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $_SESSION['type']?></a>
        </li>
        <li >
          <a href="#"><img class="img-nav" src="images/rols/<?php echo $_SESSION['image']?>" alt=""></a>
        </li>
        <li class="nav-item">
          <form action="<?php echo basename($_SERVER['PHP_SELF'])?>" method="get" >
              <button name="logout" class="ml-2 nav-link btn-light">Logout</button>
          </form>
        </li>
      </ul>
  </div>
<?php }?>
</nav>