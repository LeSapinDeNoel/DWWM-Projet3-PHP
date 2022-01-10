<?php

namespace App\Libraries;

class Hash
{
    /**
	 * Hash le mot de passe récupéré.
	 * @return string
	 * @author Quentin Felbinger
	 */
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
	 * Vérifie le mot de passe récupéré avec celui de la base de données.
	 * @return bool
	 * @author Quentin Felbinger
	 */
    public static function check($strPwd, $db_pwd)
    {
        if(password_verify($strPwd, $db_pwd)) {
            return true;
        }else {
            return false;
        }
    }
}

?>