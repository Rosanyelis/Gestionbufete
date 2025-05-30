<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function MediosContacto()
    {
        return $this->belongsTo(MedioContacto::class, 'medio_contactos_id', 'id');
    }
}
