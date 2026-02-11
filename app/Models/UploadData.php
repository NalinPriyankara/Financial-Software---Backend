<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadData extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'stored_name',
        'format',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(UserManagement::class, 'user_id');
    }
}
