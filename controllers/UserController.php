<?php


namespace controllers;

use models\User;

class UserController extends C_Base
{
       public function action_show(){
        $model = new User();
        $this->title = '::Информация о пользователе';
        $user = $model->getUser();
        $this->content = $this->Template('user', ['user' => $user]);


    }


}