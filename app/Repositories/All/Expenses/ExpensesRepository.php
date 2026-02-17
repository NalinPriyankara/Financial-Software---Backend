<?php

namespace App\Repositories\All\Expenses;

use App\Models\Expense;
use App\Repositories\Base\BaseRepository;

class ExpensesRepository extends BaseRepository implements ExpensesInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }
}
