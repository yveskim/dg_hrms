<?php 
if (!defined('BASEPATH'))exit('No direct access script allowed');

require 'fpdf185/fpdf.php';

class MyFpdf extends Fpdf{
    function __construct(){
        parent::construct();
        $CI =& get_instance();
    }
}
