<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'title',
        'id',
        'text',
        'time',
        'update_at',
        'user_id',
        'publish'

    ];

    public $seach_able = [
        'name',
        'id',
        'text',
    ];





    


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
