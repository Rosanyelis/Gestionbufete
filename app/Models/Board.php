<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kamban()
    {
        return $this->belongsTo(Kamban::class, 'kamban_id', 'id');
    }

    public function boardTasks()
    {
        return $this->hasMany(BoardTask::class, 'board_id', 'id');
    }
}
