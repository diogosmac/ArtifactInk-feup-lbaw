<?php

namespace App\Http\Controllers\EmailService;

use App\Http\Controllers\Controller;

class EmailServiceController extends Controller {


    public function sendRecoverPasswordEmail($email, $token) {
        if (!isset($email) || !isset($token)) {
            return false;
        }

        print($email);
        print($token);

        return true;
    }

    public function sendNewsletterEmail($email) {
        
    }
}

?>