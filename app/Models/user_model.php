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
    // protected $beforeInsert     = ['beforeInsert'];
    // protected $beforeUpdate     = ['beforeUpdate'];

    // protected function beforeInsert(array $newData) {
    //     $this->_data = $this->passwordHash($newData);

    //     return $this->_data;
    // }

    // protected function beforeUpdate(array $newData) {
    //     $this->_data = $this->passwordHash($this->data);

    //     return $this->_data;
    // }

    // protected function passwordHash(array $newData) {
    //     var_dump($newData);
    //     var_dump($newData['data']['user_pwd']);die();
    //     if(!isset($newData['user_pwd'])) {
    //         $newData['user_pwd'] = password_hash($newData['user_pwd']. PASSWORD_DEFAULT);
    //     }

    //     return $newData;
    // }

}