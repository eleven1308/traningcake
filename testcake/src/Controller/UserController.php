<?php
// src/Controller/ArticlesController.php

namespace App\Controller;
class UsersController extends AppController{
     var $uses = array('User');
     public $name = "Users"; // tên của Controller User
     function index(){
      $data = $this->User->find("all");
      $this->set("data",$data);
     }
}