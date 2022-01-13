<?php

namespace App\Models;
use CodeIgniter\Model;

class Critic_model extends Model
{
    protected $table         = 'critics';
    protected $primaryKey    = 'critic_id';
    protected $allowedFields = ['critic_creator', 'critic_title', 'critic_content', 'critic_createdate', 'critic_img', 'critic_status', 'critic_cat'];

    protected $returnType    = 'App\Entities\critic_entity';
    protected $useTimestamps = false;

    public function findAllWithCat($intLimit = 0){

        $this->join('category', 'cat_id = critic_cat');
        $this->join('users', 'critic_creator = user_id');

        //Recherche de formulaire
        $request  = service('request');
        //quand event déclancher entre dans if
        if ($request->getPost('envoyer')){

            $objCritic = new \App\Entities\Critic_entity();
            $objCritic->keyword   = $request->getPost('keyword');
            $objCritic->creator   = $request->getPost('creator');
            $objCritic->date  	  = $request->getPost('date');
            $objCritic->cat   	  = $request->getPost('cat');

            //affichage de la recherche par titre
            //recherche par mots dans le titre
            if($request->getPost('keyword')){
              //recherche par mots clés
              return $this->like('critic_title', $objCritic->keyword)->find();
            }
            if($request->getPost('creator')){
              //recherche par créateur
              return $this->where('critic_creator', $request->getPost('creator'))->find();
            }

            //recherche par date
            if($request->getPost('date')){
              return $this->where('critic_createdate', $request->getPost('date'))->find();
            }

            if($request->getPost('cat')){
              //recherche par Catégories
              return $this->where('critic_cat', $request->getPost('cat'))->find();
            }

            
          }
          
          if($intLimit == 1){
            return $this->limit(8)->find();
          }

        return $this->findAll();

    }


      //Fonction pour créer une nouvelle critique
      // public function addCritic(){
      //
      // }
}
