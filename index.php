<?php
//   var_dump( $_SERVER) ;
// var_dump($_SESSION);
//   die();
    include_once 'app/server/controlers/cont-administrator.php';
    include_once 'app/server/controlers/cont-courses.php';
    include_once 'app/server/controlers/cont-roles.php';
    include_once 'app/server/controlers/cont-students.php';
    $abl = new AdminController;
    $conC = new coursesContruler;
    $conS = new studentContruler;
    session_start();
    
    if(!isset($_POST['LoginLogin'])&&!isset($_GET['schoolHome'])&&!isset($_GET['AdministratorHome'])&&!isset($_GET['showStudent'])&&!isset($_GET['showCourse'])&&!isset($_GET['addStudent'])&&!isset($_GET['addCourse'])&&!isset($_POST['editCourse'])&&!isset($_POST['SaveCourse'])&&!isset($_POST['DeleteCourse'])){
        $_SESSION['hasErrors'] = false;
        $_SESSION['rank'] = '';
        $_SESSION['name'] = '';
        $_SESSION['type'] = '';
        $_SESSION['image'] = '';
        $_SESSION['header'] = 'schoolHome';
        $_SESSION['main'] = '';
        $_SESSION['mainEdit'] = '';
        $_SESSION['coursId'] = '';
        $_SESSION['studentId'] = '';
    }
   
    if(isset($_POST['LoginLogin'])){
        if(!empty($_POST['userNameLogin'] && !empty($_POST['pwdLogin']))){
        
            $userName = $_POST['userNameLogin'];
            $password = $_POST['pwdLogin'];
            $control = $abl->ActionGetLogin($userName, $password);
    
        }
    }
    // log out
    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: index.php");
    }

    // for home school
    if(isset($_GET['schoolHome'])){
        $_SESSION['header'] = 'schoolHome';
        $_SESSION['main'] = '';
        $_SESSION['mainEdit'] = '';
    }

    // for home adminisfrator
    if(isset($_GET['AdministratorHome'])){
        $_SESSION['header'] = 'AdministratorHome';
        $_SESSION['mainEdit'] = '';
    }

    // for show student
    if(isset($_GET['showStudent'])){
        $_SESSION['studentId'] = $_GET['corseId'];
        $_SESSION['main'] = 'showS';
        $_SESSION['mainEdit'] = '';
    }
    if(isset($_GET['showCourse'])){
        $_SESSION['coursId'] = $_GET['corseId'];
        $_SESSION['main'] = 'showC';
        $_SESSION['mainEdit'] = '';
    }
    if(isset($_GET['addStudent'])){
        $_SESSION['main'] = 'addS';
        $_SESSION['mainEdit'] = '';
    }
    if(isset($_GET['addCourse'])){
        $_SESSION['main'] = 'addC';
        $_SESSION['mainEdit'] = '';
    }
    if(isset($_POST['editCourse'])){
        $_SESSION['mainEdit'] = 'EditC';
    }
    if(isset($_POST['SaveCourse'])){
        if(empty($_POST['idOfCourseForEdit'])){
            if(!empty($_POST['NameCourse'])&&!empty($_POST['DescriptionCourse'])&&!empty($_FILES['AddimageCourse'])){
                // check image errer

                $tempFile = $_FILES;
                $position = "images/courses/";
                $fileNewName = $conC->ActionInsertImage($position,$tempFile);
                $course = new ModelCourses([
                    'name' => $_POST['NameCourse'],
                    'description'  => $_POST['DescriptionCourse'],
                    'image' => $fileNewName
                ]);

                $conC->ActionInsertCourses($course);
                $_SESSION['mainEdit'] = '';

            }
        }elseif(!empty($_POST['idOfCourseForEdit'])){
            if(!empty($_POST['NameCourse'])&&!empty($_POST['DescriptionCourse'])){
                if(file_exists($_FILES['editImageCourse']['tmp_name'])){
                    // var_dump($_FILES['editImageCourse']);
                    // die();
                    $tempFile = $_FILES;
                    $position = "images/courses/";
                    $fileNewName = $conC->ActionInsertImage($position,$tempFile);
                    $course = new ModelCourses([
                        'id' => $_POST['idOfCourseForEdit'],
                        'name' => $_POST['NameCourse'],
                        'description'  => $_POST['DescriptionCourse'],
                        'image' => $fileNewName
                    ]);
                    // var_dump($course);
                    // die();
                    $conC->ActionUpdateCourse($course);
                    $_SESSION['mainEdit'] = '';
                }else{
                    $course = new ModelCourses([
                        'id' => $_POST['idOfCourseForEdit'],
                        'name' => $_POST['NameCourse'],
                        'description'  => $_POST['DescriptionCourse'],
                        'image' => $_POST['helperNameImage']
                    ]);
                    // var_dump($course);
                    // die();
                    $conC->ActionUpdateCourse($course);
                    $_SESSION['mainEdit'] = '';
                }
            }
        }
    }
    if(isset($_POST['DeleteCourse'])){
        if(!empty($_POST['idOfCourse'])){
            $idCourse = $_POST['idOfCourse'];
            $_SESSION['hasErrors'] = false;
            $_SESSION['header'] = 'schoolHome';
            $_SESSION['main'] = '';
            $_SESSION['mainEdit'] = '';
            $_SESSION['coursId'] = '';
            $_SESSION['studentId'] = '';
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
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

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

