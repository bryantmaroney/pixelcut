<?php


namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

trait EmailSendTrait
{
    public static function sendEmail($user)
    {
        $senderEmail = "support@xenren.co";
        $senderName = 'Pixel Cut';
        $receiverEmail = $user->email;
        $userName = $user->first_name .' '. $user->last_name ;
        Mail::send('theme.mail.invite', array('email' => $user->email, 'username' => $userName),
            function ($message) use ($senderEmail, $senderName, $receiverEmail)
            {
                $message->from($senderEmail, $senderName);
                $message->to($receiverEmail)
                    ->subject('Pixel Cut Invite');
           });
    }
}
