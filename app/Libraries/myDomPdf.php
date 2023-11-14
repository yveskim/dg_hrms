<?php
/*Created a library for Dompdf to be used in making pdf*/
if (!defined('BASEPATH')) exit('no direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class myDomPdf extends Dompdf
{
  function __construct(){
    parent::__construct();
  }
}

 ?>
