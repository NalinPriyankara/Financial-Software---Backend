<?php

namespace App\Repositories\All\SaleItems;

use App\Models\SaleItem;
use App\Repositories\Base\BaseRepository;

class SaleItemsRepository extends BaseRepository implements SaleItemsInterface
{
    public function __construct(SaleItem $model)
    {
        parent::__construct($model);
    }
}
