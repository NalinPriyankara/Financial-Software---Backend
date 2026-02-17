<?php

namespace App\Repositories\All\Suppliers;

use App\Models\Supplier;
use App\Repositories\Base\BaseRepository;

class SuppliersRepository extends BaseRepository implements SuppliersInterface
{
    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }
}