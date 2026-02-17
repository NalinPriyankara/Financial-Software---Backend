<?php

namespace App\Repositories\All\BankTransactions;

use App\Models\BankTransaction;
use App\Repositories\Base\BaseRepository;

class BankTransactionsRepository extends BaseRepository implements BankTransactionsInterface
{
    public function __construct(BankTransaction $model)
    {
        parent::__construct($model);
    }
}
