<?php

namespace App\Repositories\All\Debtors;

use App\Models\Debtor;
use App\Repositories\Base\BaseRepository;

class DebtorsRepository extends BaseRepository implements DebtorsInterface
{
    public function __construct(Debtor $model)
    {
        parent::__construct($model);
    }
}