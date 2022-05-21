<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Custom {

    public function __construct(){
        // spl_autoload_register(array($this, 'loader'));
        return "spk cok";
    }

    // public function customp(){
    //     if (substr($className, 0, 6) == 'models')
    //         require  APPPATH .  str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    // }
    public function hitung($a,$b)
    {
        return ($a+$b);
    }
}
?>