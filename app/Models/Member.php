<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Member extends Model{
    protected $table = 'member';
    protected $fillable = ['name', 'phone', 'start', 'end'];
    protected $errors = [];

    public function validate(array $data){
        if (! $data['name']) {
        $this->errors['name'] = 'Name is required.';
        }

        if (strlen($data['phone']) < 9 || strlen($data['phone']) > 11) {
        $this->errors['phone'] = 'Invalid phone number.';
        }

        return (count($this->errors) > 0 ? false : true);
    }
        
    public function getErrors() {
        return $this->errors;
    }

    public function getData(){
        $members = $this->get();
        return $members;
    }

    public function getMember($id){
        $member = $this->where('id', $id)->first();
        return $member;
    }
}