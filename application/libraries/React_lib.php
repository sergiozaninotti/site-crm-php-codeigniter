<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class React_lib{

    public function load(){
        require '../vendor/autoload.php';

        $loop = React\EventLoop\Factory::create();

        return $loop;
    }

}