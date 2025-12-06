<?php

namespace App\Helpers;

class PushNotification
{
    public static function send($token, $title, $body)
    {
        $data = [
            "to" => $token,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];

        $headers = [
            "Authorization: key=" . env("FIREBASE_SERVER_KEY"), // use private key here
            "Content-Type: application/json"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_exec($ch);
        curl_close($ch);
    }
}
