<?php 
if (!defined('BASEPATH'))exit('No direct access script allowed');

require_once 'phpqrcode/qrlib.php';

class MyQrGenerator extends Qrlib{
    function __construct(){
        parent::construct();
        $CI =& get_instance();
    }
}
