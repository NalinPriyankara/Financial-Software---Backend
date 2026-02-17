<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_name',
        'total_amount',
        'paid_amount',
        'balance',
        'interest_rate',
        'start_date',
        'end_date',
    ];
}
