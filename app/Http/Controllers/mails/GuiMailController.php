<?php

namespace App\Http\Controllers\mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThongBaoMail;

class GuiMailController extends Controller
{
    public function sendEmail(Request $request)
    {

        $data = [
            'subject' => $request->input('subject'),
            'message' => $request->input('content')
        ];

        Mail::to($request->input('email'))->send(new ThongBaoMail($data));

        return true;
    }
}
