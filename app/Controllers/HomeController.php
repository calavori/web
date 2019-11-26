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
        $members = New Member();   
        // Thu thập dữ liệu cho view
        $data = [
            'messages' => session_get_once('messages'),
            'errors' => session_get_once('errors'),
            'members' => $members->getData()
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
            redirect('/#manage', ['messages' => $messages]);
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

    public function get_member_info(){
        $str = $_POST['end']."+".$_POST['course']." Months";
        $end_month = strtotime($str);
        return[
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'start' => date("Y-m-d 0:0:0", strtotime($_POST['start'])),
            'end' => date("Y-m-d 23:59:59", $end_month)
        ];   
    }


    public function edit($id){
        $members = new Member();
        $member = $members->getMember($id);
        $data = [
            'errors' => session_get_once('errors'),
            'member' =>  $member->toArray()
            ];
            echo $this->view->render('manage\edit', $data);
    }

    public function update($id){
        $members = new Member();
        $member = $members->getMember($id);
        if (! $member) {
            $this->notFound();
        }
        $data = $this->get_member_info();
        if ($member->validate($data)) {
            $member->fill($data)->save();
            $messages = ['success' => 'Member has been edited.'];
            redirect('/#manage', ['messages' => $messages]);
            }
        $this->saveFormValues();
        redirect('edit/'.$id, ['errors' => $member->getErrors()]);
        }

    public function delete($id){
        $members = new Member();
        $member = $members->getMember($id);
        if (! $member ) {
            $this->notFound();
        }
        $member->delete();
        $messages = ['success' => 'Member has been deleted.'];
        redirect('/#manage', ['messages' => $messages]);
    }
    
}
