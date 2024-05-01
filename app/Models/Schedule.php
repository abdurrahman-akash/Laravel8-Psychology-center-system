<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'time_slot',
        'order_by',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id' );
    }
}
