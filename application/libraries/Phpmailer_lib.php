<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class PHPMailer_Lib{

    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files
        require '../vendor/autoload.php';
        
        $mail = new PHPMailer;
        return $mail;
    }

}