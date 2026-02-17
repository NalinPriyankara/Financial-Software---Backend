<?php

namespace App\Repositories\All\BankAccounts;

use App\Models\BankAccount;
use App\Repositories\Base\BaseRepository;

class BankAccountRepository extends BaseRepository implements BankAccountsInterface
{
    public function __construct(BankAccount $model)
    {
        parent::__construct($model);
    }
}