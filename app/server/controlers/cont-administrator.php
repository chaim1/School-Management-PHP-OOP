<?php

class AdminController  
    {
        function ActionGetLogin($username, $password)
        {
            if($_SESSION['hasErrors'] ==''){
                $arreyOfErrors = [];
            }
            require_once 'app/server/bl/bl-administrators.php';
            $bla =  new  BusinessLogicAdministrator;
            $admin = $bla->getOneByUserName($username);
            if($admin == null){

                $hasErrors = true;
                array_push($this->errors, 'There is ');
                require_once 'index.php';

        }
            elseif($password !== $admin->getPwd()){
                $_SESSION['hasErrors']= 'login';
                // if(!$arreyOfErrors)

                array_push($arreyOfErrors, 'There is not');
                $_SESSION['rank']='1';
                var_dump($arreyOfErrors);
                die();
                include_once 'index.php';
                
        }
    }
}