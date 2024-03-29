<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
