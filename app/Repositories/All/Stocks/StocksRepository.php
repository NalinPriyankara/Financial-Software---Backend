<?php

namespace App\Repositories\All\Stocks;

use App\Models\Stock;
use App\Repositories\Base\BaseRepository;

class StocksRepository extends BaseRepository implements StocksInterface
{
    public function __construct(Stock $model)
    {
        parent::__construct($model);
    }
}