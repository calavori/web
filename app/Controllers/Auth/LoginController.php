<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // Nếu người dùng đã đăng nhập thì không hiện trang đăng nhập
        if (Guard::checkLogin()) {
            redirect('/');
        }

        // Thu thập dữ liệu cho view
        $data = [
            'messages' => session_get_once('messages'),
            'old' => session_get_once('form'),
            'errors' => session_get_once('errors')
        ];             

        // Tạo và hiển thị view
        echo $this->view->render('auth/login', $data);
    }

    public function login()
    {
        // Ngăn ngừa tấn công CSRF
        $this->invokeCsrfGuard();

        // Đọc giá trị của form
        $userCredentials = $this->getUserCredentials();

        $errors = [];
        $user = User::where('name', $userCredentials['acc'])->first();
        if ($user === null) {
            // Người dùng không tồn tại...
            $errors['acc'] = 'Unknown username.';
        } else if (Guard::login($user, $userCredentials)) {
            // Đăng nhập thành công...
            redirect('/');
        } else {
            // Sai mật khẩu...
            $errors['password'] = 'Incorrect password.';
        }

        // Đăng nhập không thành công...
        $this->saveFormValues(['password']);
        redirect('/login', ['errors' => $errors]);
    }

    public function logout()
    {
        Guard::logout();
        redirect('/login');
    }

    protected function getUserCredentials()
    {
        return [
            'acc' => $_POST['acc'],
            'password' => $_POST['password']
        ];        
    }
}
