<?php

namespace App\Models;
use CodeIgniter\Model;

class Category_model extends Model
{
    protected $table         = 'category';
    protected $primaryKey    = 'cat_id';
    protected $allowedFields = ['cat_id', 'cat_name'];

    protected $useTimestamps = true;

    /**
     * Permet de créer un tableau de toutes les catégorie.
     * @return array
     * @author Julie
     */
    public function findAllCatForSelect(){

      $arrAllCat = $this->findAll();
      $arrCatList = array();
      $arrCatList[] = '--';
      // var_dump($this->findAll());
      foreach ($arrAllCat as $arrDetCat) {
        $arrCatList[$arrDetCat['cat_id']] = $arrDetCat['cat_name'];
      }
      return $arrCatList;
    }

}
