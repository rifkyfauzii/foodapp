<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'qty',
        'notes',
        'total',
        'table_number',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
