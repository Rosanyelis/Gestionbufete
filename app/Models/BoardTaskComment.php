<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardTaskComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function boardTask()
    {
        return $this->belongsTo(BoardTask::class, 'board_task_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function attachments()
    // {
    //     return $this->hasMany(BoardTaskCommentFile::class, 'board_task_comment_id', 'id');
    // }
}
