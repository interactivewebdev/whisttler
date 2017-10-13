<?php

namespace App;


class Util 
{
    
    /* Send Mail */
    /* Parameters : data array : subject,to,message   */
    public static function sendMail($data) {
        
       
         \Mail::send($data['blade'], $data, function($message)use($data) {
         $message->to($data['email'])->subject($data['subject']);
        
      });
        
        
        
        return true;
        
        
    }
    
    /* Create random number 
      
     *      */
    
    public static function generateRandomCode($digits=2) {
       
       
    return rand(pow(10, $digits-1), pow(10, $digits)-1);
        
    }
    
}