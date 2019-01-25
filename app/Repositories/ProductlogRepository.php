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
     * @param array $columns
     * @return mixed
     */
    public function findByProductID($productID, $columns = array('*')) {
        return $this->model->where('productID', '=', $productID)->get($columns);
    }
}