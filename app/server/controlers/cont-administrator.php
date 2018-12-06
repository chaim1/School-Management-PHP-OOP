<?php
require_once 'app/server/controlers/controler.php';
require_once 'app/server/bl/bl-administrators.php';

class AdminController  extends IController
    {
        private $arreyOfErrors=[]; 
        // private $AdminModel; 
        private $AdminId; 
        private $blA;

        function __construct(){
            $this->blA = new BusinessLogicAdministrator;
        }

        function ActionGetLogin($username, $password)
        {
            $admin = $this->blA->getOneByUserName($username);
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
                $_SESSION['rank'] = $admin->getRole_id();
                $_SESSION['name'] = $admin->getName();
                $_SESSION['type'] = $admin->getRoleModel()->getDescription();
                $_SESSION['image'] = $admin->getImage();     
            }
        } 
        public function getErrors() {
            return $this->arreyOfErrors;
        }

        public function ActionGetAdmin(){
            $Admins = $this->blA->get();
            return $Admins;
        }

        public function ActionGetOneAdmin($id){
            $admin = $this->blA->getOne($id);
            return $admin;
        }

        public function ActionInsertAdmin($params){
            return $this->blA->set($params);
        }

        public function ActionUpdateAdmin($params){
            return $this->blA->update($params);
        } 
        
        // public function getAdminModel() {
        //     if (empty($this->AdminModel)) {
        //         $bla = new BusinessLogicAdministrator;
        //         $this->AdminModel = $bla->getOne($this->AdminId);
        //     }
        //     return $this->AdminModel;
        // }

}