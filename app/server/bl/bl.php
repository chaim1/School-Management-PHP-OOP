<?php
include_once 'dal.php';

abstract class BusinessLogic
{
    private $dal;

    public function __construct()
    {
        $this->dal = DataAccessLayer::Instance();
    }
    public function getDal(){
        return $this->dal;
    }
    abstract public function get();
    abstract public function set($param);
    abstract public function delete($id);
    abstract public function update($id);
}



