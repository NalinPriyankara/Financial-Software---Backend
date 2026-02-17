<?php

namespace App\Repositories\All\Sales;

use App\Models\Sale;
use App\Repositories\Base\BaseRepository;

class SalesRepository extends BaseRepository implements SalesInterface
{
    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }
}
