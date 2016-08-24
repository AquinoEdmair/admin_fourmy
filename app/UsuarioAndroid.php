<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioAndroid extends Model
{
	
	/**
     * Sending Push Notification
     */
    public static function send_notification($registatoin_ids, $message) {

        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );

 
        $headers = array(
            'Authorization: key=' ."AIzaSyDBJJ7nP44ZVdE91iAZKs8yLgfmYD7cO3Q",
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $respuesta = 1;
        $result = curl_exec($ch);
        if ($result === FALSE) {
            $respuesta = 0;
        }
 
        // Close connection
        curl_close($ch);
        return $respuesta;
    }
    
}
