<?php

namespace App\Repositories\All\CompanySetup;

use App\Models\CompanySetup;
use App\Repositories\Base\BaseRepository;

class CompanySetupRepository extends BaseRepository implements CompanySetupInterface
{
    public function __construct(CompanySetup $model)
    {
        parent::__construct($model);
    }
}
