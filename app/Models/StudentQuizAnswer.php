<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQuizAnswer extends Model
{
    protected $table = 'student_quiz_answers'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_item_id', 'student_quiz_id', 'answer'
    ];

    public $timestamps = false;
}
