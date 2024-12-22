<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedioContacto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Clientes()
    {
        return $this->hasMany(Client::class, 'medio_contactos_id', 'id');
    }
}
