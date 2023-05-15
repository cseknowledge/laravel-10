<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Send email.
     *
     * @return void
     */
    public function sendMail()
    {
        $details['to'] = 'cseknowledge@gmail.com';
        $details['name'] = 'Md. Arif Dewan';
        $details['subject'] = 'Test mail...';
        $details['message'] = 'Here goes all message body.';

        SendMailJob::dispatch($details);

        return response('Email sent successfully');
    }
}
