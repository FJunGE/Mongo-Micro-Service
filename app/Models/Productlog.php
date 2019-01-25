<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Productlog extends Eloquent
{
    protected $collection = 'ss_product_log';
    protected $primaryKey = '_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productID', 'date','brief', 'details','admin', 'remark'
    ];

}