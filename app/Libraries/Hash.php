<?php

namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($form_pwd, $db_pwd)
    {
        // if(password_verify($form_pwd, $db_pwd)) {
        //     return true;
        // }else {
        //     return false;
        // }

        if($form_pwd == $db_pwd) {
            return true;
        }else {
            return false;
        }
    }
}

?>