<?php

namespace App\Repositories\All\Loans;

use App\Models\Loan;
use App\Repositories\Base\BaseRepository;

class LoansRepository extends BaseRepository implements LoansInterface
{
    public function __construct(Loan $model)
    {
        parent::__construct($model);
    }
}