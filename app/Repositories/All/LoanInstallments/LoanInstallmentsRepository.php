<?php

namespace App\Repositories\All\LoanInstallments;

use App\Models\LoanInstallment;
use App\Repositories\Base\BaseRepository;

class LoanInstallmentsRepository extends BaseRepository implements LoanInstallmentsInterface
{
    public function __construct(LoanInstallment $model)
    {
        parent::__construct($model);
    }
}