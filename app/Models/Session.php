<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'schedule_id',
        'psy_id',
        'user_id',
        'order_by',
        'presenting_issue',
        'session_activities',
        'image',
        'Next_date_follow',
        'Next_date_time_slot',

    ];


    public function case()
    {
        return $this->belongsTo(CaseStudy::class,'case_id','id' );
    }

    public function sche()
    {
        return $this->belongsTo(Schedule::class,'schedule_id','id' );
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id' );
    }

    public function psy()
    {
        return $this->belongsTo(User::class,'psy_id','id' );
    }

}
