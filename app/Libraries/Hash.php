<?php

namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($strPwd, $db_pwd)
    {
        if(password_verify($strPwd, $db_pwd)) {
            return true;
        }else {
            return false;
        }

        // if($strPwd == $db_pwd) {
        //     return true;
        // }else {
        //     return false;
        // }
    }
}

?>