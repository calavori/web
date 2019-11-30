<?php

namespace App\Controllers;

use App\Models\User;
use App\SessionGuard as Guard;

class StaffController extends Controller{

    public function __construct()
    {
        // Nếu người dùng chưa đăng nhập thì chuyển hướng đến đăng nhập
        if (! Guard::checkLogin()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function edit($id){
        if( $_SESSION['user_id'] != $id){
            $this->notFound();
        }
        else{
            $user = User::where('id', $id)->first();
            $data = [
                'errors' => session_get_once('errors'),
                'user' =>  $user->toArray()
                ];
                echo $this->view->render('manage\edit_staff', $data);
        }
    }

    public function update($id){
        $user = User::where('id', $id)->first();
        if (! $user || $_SESSION['user_id'] != $id) {
            $this->notFound();
        }
        
        if (empty($_POST['pass'])){
            $data = [
                'name' => $user->name,
                'email' => $_POST['email'],
                'password' => $user->password
            ];
        }
        else{
            $data =[
                'name' => $user->name,
                'email' => $_POST['email'],
                'password' => password_hash($_POST['pass'], PASSWORD_DEFAULT)
            ];
        }

        $user->fill($data)->save();
        $messages = ['success' => 'Information has been edited.'];
        redirect('/', ['messages' => $messages]);
    }
}






