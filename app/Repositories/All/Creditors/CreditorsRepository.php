<?php

namespace App\Repositories\All\Creditors;

use App\Models\Creditors;
use App\Repositories\Base\BaseRepository;

class CreditorsRepository extends BaseRepository implements CreditorsInterface
{
    public function __construct(Creditors $model)
    {
        parent::__construct($model);
    }
}