<?php
require_once 'app/server/bl/bl-administrators.php';

class AdminController  
    {
        private $arreyOfErrors=[]; 
        private $AdminModel; 
        private $AdminId; 



        function ActionGetLogin($username, $password)
        {
            $bla =  new  BusinessLogicAdministrator;
            $admin = $bla->getOneByUserName($username);
            if($admin->getUsername() == null){

                $_SESSION['hasErrors']= true;
                array_push($this->arreyOfErrors, 'Username does not exist');
                require_once 'index.php';

        }
            elseif($password !== $admin->getPwd()){

                $_SESSION['hasErrors']= true;
                array_push($this->arreyOfErrors, 'Incorrect password');
                $_SESSION['rank']='';
                include_once 'index.php';
                
        }
            elseif($username == $admin->getUsername() && $password == $admin->getPwd()){
                $this->AdminId =$admin->getId();

                if($admin->getRole_id()==1){
                    $_SESSION['rank']='1';

                }elseif($admin->getRole_id()==2){
                    $_SESSION['rank']='2';

                }elseif($admin->getRole_id()==3){
                    $_SESSION['rank']='3';

                }
                    
        }


        }public function getErrors() {
            return $this->arreyOfErrors;
        }

        public function getAdminModel() {
            if (empty($this->AdminModel)) {
                $bla = new BusinessLogicAdministrator;
                $this->AdminModel = $bla->getOne($this->AdminId);
            }
            return $this->AdminModel;
        }

}