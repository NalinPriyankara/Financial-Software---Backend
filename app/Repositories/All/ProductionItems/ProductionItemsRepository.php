<?php

namespace App\Repositories\All\ProductionItems;

use App\Models\ProductionItem;
use App\Repositories\Base\BaseRepository;

class ProductionItemsRepository extends BaseRepository implements ProductionItemsInterface
{
    public function __construct(ProductionItem $model)
    {
        parent::__construct($model);
    }
}
