<?php 
if (!defined('BASEPATH'))exit('No direct access script allowed');

require 'tcpdf/tcpdf.php';

class MyTcpdf extends Tcpdf{
    function __construct(){
        parent::construct();
        $CI =& get_instance();
    }
}
