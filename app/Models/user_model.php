<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';

    protected $useAutoIncrement = true;

    protected $allowedFields    = ['user_name', 'user_firstname', 'user_mail', 'user_pwd', 'user_avatar', 'user_role'];

    protected $returnType       = 'App\Entities\user_entity';

    public function findAllUsersForSelect(){

      $arrAllUsers = $this->findAll();
      $arrUsersList = array();
      $arrUsersList[] = '--';
      foreach ($arrAllUsers as $arrDetUsers) {
      //echo "<pre>";var_dump($arrDetUsers);die();
        $arrUsersList[$arrDetUsers->user_id] = $arrDetUsers->user_name . " " . $arrDetUsers->user_firstname ;
      }
      return $arrUsersList;
    }
}
