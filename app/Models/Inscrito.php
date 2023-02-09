<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrito extends Model
{
    protected $fillable = ['evento_id', 'nome', 'email', 'telefone', 'idade'];


    public function evento(){
        return $this->belongsTo(Evento::class, 'evento_id');
    }
}
