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
        //var_dump(count($this->request->getPost('envoyer')));
        $request  = service('request');
        //quand event déclancher entre dans if
        if ($request->getPost('envoyer')){
            //echo "coucou";
            $objCritic = new \App\Entities\Critic_entity();
            $objCritic->keyword   = $request->getPost('keyword');

            $objCritic->creator   = $request->getPost('creator');
            $objCritic->date  	  = $request->getPost('date');
            $objCritic->startdate = $request->getPost('startdate');
            $objCritic->enddate   = $request->getPost('enddate');
            //affichage de la recherche par titre
            //method like permet de....

            //recherche par name
            if($request->getPost('keyword')){
              //recherche par mots clés
              return $this->like('critic_title', $objCritic->keyword)->find();
            }
            if($request->getPost('creator')){
              //recherche par créateur
              //$where = "user_name LIKE '${$request->getPost('creator')}%'";
              return $this->join('users', 'critics.critic_creator=users.user_id')->like('user_name', $objCritic->creator)->orLike('user_firstname', $objCritic->creator)->find();
              //return $this->join('users', 'critics.critic_creator=users.user_id')->where($where)->find();
            }
            //recherche par date
            if($request->getPost('date')){
              //recherche par date
              return $this->where('critic_createdate', $request->getPost('date'))->find();
            }
          }

        return $this->findAll();

    }

    // protected $createdField = 'cust_createdate';
    // protected $updatedField = 'cust_updatedate';
    // protected $deletedField = 'cust_deletedate';
}
