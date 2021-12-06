<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'user_id';
    protected $allowedFields = ['user_name', 'user_firstname', 'user_mail', 'user_pwd', 'user_avatar', 'user_role'];

    protected $returnType    = 'App\Entities\user_entity';
    protected $useTimestamps = true;

    public function findAllWithCat(){
        $this->join('category', 'cat_id = critic_cat');
        //Recherche de formulaire
        //TODO Faire la recherche avec des where
        // if (count($this->request->getPost()) > 0){
        //     $objCritic = new \App\Entities\Critic_entity();
        //     $objCritic->keyword   = $this->request->getPost('keyword');
        //     $objCritic->creator   = $this->request->getPost('creator');
        //     $objCritic->date  	  = $this->request->getPost('date');
        //     $objCritic->startdate = $this->request->getPost('startdate');
        //     $objCritic->enddate   = $this->request->getPost('enddate');
        //   }
        return $this->findAll();
    }

    // protected $createdField = 'cust_createdate';
    // protected $updatedField = 'cust_updatedate';
    // protected $deletedField = 'cust_deletedate';
}
