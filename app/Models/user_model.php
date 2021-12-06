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

    // protected function beforeInsert(array $data) {
    //     $this->_data = $this->passwordHash($this->data);

    //     return $this->_data;
    // }

    // protected function beforeUpdate(array $data) {
    //     $this->_data = $this->passwordHash($this->data);

    //     return $this->_data;
    // }

    // protected function passwordHash(array $data) {
    //     if(!isset($this->_data['pwd'])) {
    //         $this->_data['pwd'] = password_hash($this->_data['pwd']. PASSWORD_DEFAULT);
    //     }

    //     return $this->_data;
    // }

}