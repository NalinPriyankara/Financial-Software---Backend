<?php

namespace App\Repositories\All\Items;

use App\Models\Item;
use App\Repositories\Base\BaseRepository;

class ItemsRepository extends BaseRepository implements ItemsInterface
{
    public function __construct(Item $model)
    {
        parent::__construct($model);
    }
}