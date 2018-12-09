<?php

//   var_dump( $_SERVER) ;
//   var_dump($_SESSION);
//   die();

    include_once 'app/server/controlers/cont-administrator.php';
    include_once 'app/server/controlers/cont-courses.php';
    include_once 'app/server/controlers/cont-roles.php';
    include_once 'app/server/controlers/cont-students.php';
    $abl = new AdminController;
    $conC = new coursesContruler;
    $conS = new studentContruler;
    session_start();
    
    if(!isset($_POST['LoginLogin'])&&!isset($_GET['schoolHome'])&&!isset($_GET['AdministratorHome'])&&!isset($_GET['showStudent'])&&!isset($_GET['showCourse'])&&!isset($_GET['addStudent'])&&!isset($_GET['addCourse'])&&!isset($_POST['editCourse'])&&!isset($_POST['SaveCourse'])&&!isset($_POST['DeleteCourse'])&&!isset($_POST['editStudent'])&&!isset($_POST['SaveStudent'])&&!isset($_POST['DeleteStudent'])&&!isset($_POST['addAdministator'])&&!isset($_POST['showAdministrator'])&&!isset($_POST['editAdmin'])&&!isset($_POST['SaveAdmin'])&&!isset($_POST['DeleteAdmin'])){
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
        $_SESSION['adminId'] = '';

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
        $_SESSION['main'] = '';
        $_SESSION['mainEdit'] = '';
    }

    // for show student
    if(isset($_GET['showStudent'])){
        $_SESSION['studentId'] = $_GET['studentId'];
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
    if(isset($_POST['editStudent'])){
        $_SESSION['mainEdit'] = 'EditS';
    }
    
    // save and update courses
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
                    $tempFile = $_FILES;
                    $position = "images/courses/";
                    $fileNewName = $conC->ActionInsertImage($position,$tempFile);
                    $course = new ModelCourses([
                        'id' => $_POST['idOfCourseForEdit'],
                        'name' => $_POST['NameCourse'],
                        'description'  => $_POST['DescriptionCourse'],
                        'image' => $fileNewName
                    ]);
                    $conC->ActionUpdateCourse($course);
                    $_SESSION['mainEdit'] = '';
                }else{
                    $course = new ModelCourses([
                        'id' => $_POST['idOfCourseForEdit'],
                        'name' => $_POST['NameCourse'],
                        'description'  => $_POST['DescriptionCourse'],
                        'image' => $_POST['helperNameImage']
                    ]);
                    $conC->ActionUpdateCourse($course);
                    $_SESSION['mainEdit'] = '';
                }
            }
        }
    }
    if(isset($_POST['DeleteCourse'])){
        if(!empty($_POST['idOfCourse'])){
                $conC->ActionDeleteCourse($_POST['idOfCourse'],$_POST['numOfStoudents']);    
        }
    }

    if(isset($_POST['SaveStudent'])){
        if(empty($_POST['idOfStudentForEdit'])){
            if(!empty($_POST['NameStudent'])&&!empty($_POST['PhoneStudent'])&&!empty($_POST['EmailStudent'])&&!empty($_FILES['AddimageStudent'])){
                // check image errer
                $tempFile = $_FILES;
                $position = "images/students/";
                $fileNewName = $conC->ActionInsertImage($position,$tempFile);
                $student = new ModelStudents([
                    'name' => $_POST['NameStudent'],
                    'phone'  => $_POST['PhoneStudent'],
                    'email'  => $_POST['EmailStudent'],
                    'image' => $fileNewName
                ]);

                $conS->ActionInsertStudent($student);
                $_SESSION['mainEdit'] = '';
            }
        }elseif(!empty($_POST['idOfStudentForEdit'])){
            if(!empty($_POST['NameStudent'])&&!empty($_POST['PhoneStudent'])&&!empty($_POST['EmailStudent'])){
                if(file_exists($_FILES['editImageStudent']['tmp_name'])){
                    $tempFile = $_FILES;
                    $position = "images/students/";
                    $fileNewName = $conC->ActionInsertImage($position,$tempFile);
                    $student = new ModelStudents([
                        'id' => $_POST['idOfStudentForEdit'],
                        'name' => $_POST['NameStudent'],
                        'phone'  => $_POST['PhoneStudent'],
                        'email'  => $_POST['EmailStudent'],
                        'image' => $fileNewName
                    ]);
                    $conS->ActionUpdateStudent($student);
                    $_SESSION['mainEdit'] = '';
                }else{
                    $student = new ModelStudents([
                        'id' => $_POST['idOfStudentForEdit'],
                        'name' => $_POST['NameStudent'],
                        'phone'  => $_POST['PhoneStudent'],
                        'email'  => $_POST['EmailStudent'],
                        'image' => $_POST['helperNameStudent']
                    ]);
                    $conS->ActionUpdateStudent($student);
                    $_SESSION['mainEdit'] = '';
                }
            }
        }
    }
    if(isset($_POST['DeleteStudent'])){
        if(!empty($_POST['idOfStudent'])){
                $conS->ActionDeleteStudent($_POST['idOfStudent']);    
        }
    }

    if(isset($_POST['addAdministator'])){
        $_SESSION['main'] = 'addA';
        $_SESSION['mainEdit'] = '';
    }
    if(isset($_POST['showAdministrator'])){
        $_SESSION['adminId'] = $_POST['adminId'];
        $_SESSION['main'] = 'showA';
        $_SESSION['mainEdit'] = '';
    }
    if(isset($_POST['editAdmin'])){
        $_SESSION['mainEdit'] = 'EditA';
    }
    if(isset($_POST['SaveAdmin'])){
        if(empty($_POST['idOfAdminForEdit'])){
            if(!empty($_POST['NameAdmin'])&&!empty($_POST['PhoneAdmin'])&&!empty($_POST['EmailAdmin'])&&!empty($_POST['RoleAdmin'])&&!empty($_FILES['ImageAdmin'])&&!empty($_POST['pwdAdmin'])){
                // check image errer
                $tempFile = $_FILES;
                $position = "images/rols/";
                
                $fileNewName = $abl->ActionInsertImage($position,$tempFile);
                $admin = new ModelAdministrator([
                    'name' => $_POST['NameAdmin'],
                    'Username' => $_POST['NameAdmin'],
                    'phone'  => $_POST['PhoneAdmin'],
                    'email'  => $_POST['EmailAdmin'],
                    'role_id'  => $_POST['RoleAdmin'],
                    'pwd'  => $_POST['pwdAdmin'],
                    'Image' => $fileNewName
                ]);

                $abl->ActionInsertAdmin($admin);
                $_SESSION['mainEdit'] = '';
            }
        }elseif(!empty($_POST['idOfAdminForEdit'])){
            if(!empty($_POST['NameAdmin'])&&!empty($_POST['PhoneAdmin'])&&!empty($_POST['EmailAdmin'])&&!empty($_POST['RoleAdmin'])&&!empty($_POST['pwdAdmin'])){
                if(file_exists($_FILES['ImageAdminForUpdate']['tmp_name'])){
                    $tempFile = $_FILES;
                    $position = "images/rols/";
                    $fileNewName = $abl->ActionInsertImage($position,$tempFile);                    
                    $admin = new ModelAdministrator([
                        'id' => $_POST['idOfAdminForEdit'],
                        'name' => $_POST['NameAdmin'],
                        'Username' => $_POST['NameAdmin'],
                        'phone'  => $_POST['PhoneAdmin'],
                        'email'  => $_POST['EmailAdmin'],
                        'role_id'  => $_POST['RoleAdmin'],
                        'pwd'  => $_POST['pwdAdmin'],
                        'Image' => $fileNewName
                    ]);
                    // var_dump($admin);
                    // die();
                    $abl->ActionUpdateAdmin($admin);
                    $_SESSION['mainEdit'] = '';
                }else{
                    $admin = new ModelAdministrator([
                        'id' => $_POST['idOfAdminForEdit'],
                        'name' => $_POST['NameAdmin'],
                        'Username' => $_POST['NameAdmin'],
                        'phone'  => $_POST['PhoneAdmin'],
                        'email'  => $_POST['EmailAdmin'],
                        'role_id'  => $_POST['RoleAdmin'],
                        'pwd'  => $_POST['pwdAdmin'],
                        'Image' => $_POST['helperAdminImage']
                    ]);
                    $abl->ActionUpdateAdmin($admin);
                    $_SESSION['mainEdit'] = '';
                }
            }
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

