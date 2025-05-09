<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardTask extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function board()
    {
        return $this->belongsTo(Board::class, 'board_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function comments()
    {
        return $this->hasMany(BoardTaskComment::class, 'board_task_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(BoardTaskFile::class, 'board_task_id', 'id');
    }


}
