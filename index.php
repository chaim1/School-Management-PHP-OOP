<?php
include_once 'app/server/controlers/cont-administrator.php';
$abl = new AdminController;
        session_start();
        if(!isset($_POST['LoginLogin'])){
            $_SESSION['hasErrors']= false;
            $_SESSION['rank']='';
        }
   
    

    if(isset($_POST['LoginLogin'])){
        if(!empty($_POST['userNameLogin']&&!empty($_POST['pwdLogin']))){
        
            $userName = $_POST['userNameLogin'];
            $password = $_POST['pwdLogin'];
            $control = $abl->ActionGetLogin($userName, $password);
    
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ProjectSchool</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.14/js/mdb.min.js"></script>
    <link rel="stylesheet" href="test.css">

  </head>
<body class="container-fluid mt-5">

    <header class="row">
        <?php
            include_once 'web/haeder.php';
        ?>
    </header>

    <main class="row mt-3">

        <?php if(empty($_SESSION['rank'])){

            require_once 'web/login.php';

            ?>
        <?php }elseif(!empty($_SESSION['rank'])){

            include_once 'web/aside.php';
            include_once 'web/main.php';
        }
        ?>

    </main>

    <footer class="row">
        <?php
            include_once 'web/footer.php';
        ?>
    </footer>

