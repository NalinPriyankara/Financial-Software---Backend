<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = [
        'production_date',
        'notes',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(UserManagement::class, 'created_by');
    }
}
