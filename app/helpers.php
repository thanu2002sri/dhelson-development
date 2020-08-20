<?php

use Illuminate\Support\Facades\File;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// between two dates.
if (! function_exists('dateDiffInDays')) { 
    function dateDiffInDays($date1, $date2)  
    { 
        // Calulating the difference in timestamps 
        $diff = strtotime($date2) - strtotime($date1); 
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        return abs(round($diff / 86400)); 
    } 
}



if (! function_exists('sendMail')) {
    function sendMail($to_name = '', $to_email = '', $data, $blade = '', $subject = '', $from_mail = '', $from_name = '', $file = '', $mails = '') 
    {
        Mail::send($blade, $data, function($message) use ($to_name, $to_email, $subject, $from_mail, $from_name, $file, $mails) {
            $message->to($to_email, $to_name)
            ->subject($subject);
            if(!empty($file))
            {
                foreach($file as $list)
                {
                    $message->attach($list);
                }
            }
            if(!empty($mails))
            {
                $message->cc($mails); 
            }
            $message->from($from_mail, $from_name);
        });  
    }
}

if (! function_exists('getUerRole')) 
{
    function getUerRole($user_role)
    {
        $role_info = Role::find($user_role);
        return $role_info;
    }
}

if (! function_exists('putLogData')) {
    function putLogData($channel, $file, $data)
    {
        $output = "%message%\n";
        $formatter = new LineFormatter($output);
        $streamHandler = new StreamHandler(asset("co-ordinates")."/".$file."");
        $streamHandler->setFormatter($formatter);
        $logger = new Logger($channel);
        $logger->pushHandler($streamHandler);
        $logger->info(json_encode($data));
    }
}