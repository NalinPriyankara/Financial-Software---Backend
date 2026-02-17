<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'expense_date',
        'description',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(UserManagement::class, 'created_by');
    }
}
