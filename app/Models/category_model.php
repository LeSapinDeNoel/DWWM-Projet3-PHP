<?php

namespace App\Models;
use CodeIgniter\Model;

class Category_model extends Model
{
    protected $table         = 'category';
    protected $primaryKey    = 'cat_id';
    protected $allowedFields = ['cat_id', 'cat_name'];

    protected $useTimestamps = true;

    public function findAllCatForSelect(){

      $this->findAll();
      $arrCatList = array();
      // var_dump($this->findAll());
      foreach ($this->findAll() as $key => $value) {
        
      }
      return $arrCatList;
    }

}
