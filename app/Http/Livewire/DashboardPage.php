<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\User;

class DashboardPage extends Component
{
    public $text = "Dashboard.";
    

    public function render()
    {
        return view('livewire.dashboard-page');
    }
    

    public function notify()
    {
        $this->text = "changed.";


        //send notification
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $serverKey = 'AAAA-S5wD14:APA91bHDjP2G1PgqrWqN1fzVuWPxe-33Auidsk9B-L_XymhgsZoc7lkgzKxzwAdlD_8Enh5JmEbOVm_6_sbwUqtAeEJ3EalyBitSWCnezQenDsbKlCsFhgaKQtMxwKxCgIba0ZTgVYB4';
  
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => 'testing app',
                "body" => 'hello laravel how are you ?',
                "icon" => 'images/suzy.png',

            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        

        // Close connection
        curl_close($ch);

        // FCM response
        //dd($result);        
    }
    



}
