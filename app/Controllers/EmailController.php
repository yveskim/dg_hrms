<?php
/**
 *
 */

 namespace App\Controllers;

class EmailController extends BaseController
{

  function index()
  {
    $sendTo = 'cabantingyveskim90@gmail.com';
    $subject = 'Testing Email';
    $message = 'This is just a test email.. please ignore this';
    $email = \Config\Services::email();
    $email->setTo($sendTo);
    $email->setFrom('info@gophp.in', 'Info');
    $email->setSubject($subject);
    $email->setMessage($message);

    if ($email->send()) {
      echo "success";
    }else {
      echo 'error';
    }

  }
}


 ?>
