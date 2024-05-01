<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'psy_id',
        'problem_discussion',
        'number_siblings',
        'birth_order',
        'parents_information',
        'p_history_psy',
        'f_history_psy',
        'm_history_psy',
        'self_harm',
        'development_history',
        'educational_history',
        'contract_person',
        'presenting_symptoms',
        'significant_history_presenting',
        'mental_status_examination',
        'condition_identified',
        'treatment_goal',
        'assessment',
        'treatment_plan',
        'status',

        'r_name',
        'r_id',
        'r_department',
        'r_designation',
        'r_contract',
        'r_email',

        'r_a_date',
        'r_a_time_slot',

    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id' );
    }

    public function psy()
    {
        return $this->belongsTo(User::class,'psy_id','id' );
    }

}
