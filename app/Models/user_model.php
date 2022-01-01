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


}