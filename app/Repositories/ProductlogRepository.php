<?php
namespace App\Repositories;

use App\Repositories\Repository;

class ProductlogRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Productlog';
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getProductCount($productID){
        return $this->model->where('productID', '=', $productID)->count();
    }


    /**
     * @param $productID
     * @param array $columns
     * @return mixed
     */
    public function findByProductID($productID, $skip, $take, $columns = array('*')) {
        return $this->model->where('productID', '=', $productID)->limit($take)->offset($skip)->get($columns);

    }
}