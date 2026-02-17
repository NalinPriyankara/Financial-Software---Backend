<?php

namespace App\Repositories\All\Productions;

use App\Models\Production;
use App\Repositories\Base\BaseRepository;

class ProductionsRepository extends BaseRepository implements ProductionsInterface
{
    public function __construct(Production $model)
    {
        parent::__construct($model);
    }
}
