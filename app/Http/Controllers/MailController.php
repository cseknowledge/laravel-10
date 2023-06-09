<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    public function basic_email() {
        $data = array('name'=>"Arif Dewan");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('user2@girasmail.com', 'Tutorials Point')->subject
                ('Laravel Basic Testing Mail');
            $message->from('user1@girasmail.com','Arif Dewan');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
    public function html_email() {
        $data = array('name'=>"Arif Dewan");
        Mail::send('mail', $data, function($message) {
            $message->to('cseknowledge@gmail.com', 'Tutorials Point')->subject
                ('Laravel HTML Testing Mail');
            $message->from('cseknowledge@gmail.com','Arif Dewan');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
    public function attachment_email() {
        $data = array('name'=>"Arif Dewan");
        Mail::send('mail', $data, function($message) {
            $message->to('cseknowledge@gmail.com', 'Tutorials Point')->subject
                ('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('cseknowledge@gmail.com','Arif Dewan');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
