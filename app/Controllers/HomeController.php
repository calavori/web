<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Member;
use App\SessionGuard as Guard;

class HomeController extends Controller
{
    public function __construct()
    {
        // Nếu người dùng chưa đăng nhập thì chuyển hướng đến đăng nhập
        if (! Guard::checkLogin()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function index()
    {
        // Thu thập dữ liệu cho view
        $data = [
            'messages' => session_get_once('messages'),
            'errors' => session_get_once('errors')
        ];

        // Tạo và hiển thị view
        echo $this->view->render('home', $data);
    }

    public function add(){
        $data = $this->get_newcomer_info();
        $member = new Member();
        if ($member->validate($data)){
            $member->fill($data);
            $member->save();
            $messages = ['success' => 'Member has been registered.'];
            redirect('/', ['messages' => $messages]);
        }
        redirect('/', ['errors' => $member->getErrors()]);
    }

    public function get_newcomer_info(){
        $str = "+".$_POST['course']." Months";
        $end_month = strtotime($str);
        return[
            'name' => $_POST['name'],
            'phone' => $_POST['tel'],
            'start' => date("Y-m-d 0:0:0"),
            'end' => date("Y-m-d 23:59:59", $end_month)
        ];
        
    }
    
}
