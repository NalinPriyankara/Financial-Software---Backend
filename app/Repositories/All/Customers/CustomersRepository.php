<?php

namespace App\Repositories\All\Customers;

use App\Models\Customer;
use App\Repositories\Base\BaseRepository;

class CustomersRepository extends BaseRepository implements CustomersInterface
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}