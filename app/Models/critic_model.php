<?php

namespace App\Models;
use CodeIgniter\Model;

class Critic_model extends Model
{
    protected $table         = 'critics';
    protected $primaryKey    = 'critic_id';
    protected $allowedFields = ['critic_creator', 'critic_title', 'critic_content', 'critic_createdate', 'critic_img', 'critic_status', 'critic_cat'];

    protected $returnType    = 'App\Entities\critic_entity';
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
