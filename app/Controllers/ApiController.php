<?php

namespace App\Controllers;


use App\Models\Member;
use App\Models\User;

class ApiController extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function getStatusCodeMeeage($status){
        $codes = Array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
        );
        
        return (isset($codes[$status])) ? $codes[$status] : ”;
    }

    public function sendResponse($status = 200, $body = ”, $content_type = 'text/html'){
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMeeage($status);
        header($status_header);
        header('Content-type: ' . $content_type);
        echo $body;
    }

    public function get_members(){
        $member = new Member();
        $data = $member->getData();
        if ($data != null){
            $this->sendResponse(200, '{"items":'.json_encode($data).'}');
        }
        else {
            $this->sendResponse(200, '{"items":null}');
        }
    }

    public function get_users(){
        $user = new User();
        $data = $user->getData();
        if ($data != null){
            $this->sendResponse(200, '{"items":'.json_encode($data).'}');
        }
        else {
            $this->sendResponse(200, '{"items":null}');
        }
    }

    
    
}

?>