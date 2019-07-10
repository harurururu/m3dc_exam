<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $timestamps = false;


    protected $table = 'exam_log';

    protected $fillable = [
        'todohuken',
        'fname',
        'lname',
        'viewcnt',
        'ip_addr',
        'referer',
        'usr_agent',
        'crnt_date',
    ];

}
