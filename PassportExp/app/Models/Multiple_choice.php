<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiple_choice extends Model
{
    use HasFactory;

    public $fillable = [
        'question',	
        'answer',	
        'option_a',		
        'option_b',	
        'option_c',	
        'option_d',	
        'question_id',

    ];


    public $timestamps = false;
}
