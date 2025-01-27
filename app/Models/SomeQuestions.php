<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SomeQuestions extends Model
{
    use HasFactory;
    protected $table = 'some_questions';
    protected $fillable = [
        'question',
        'answer'
    ];
}
