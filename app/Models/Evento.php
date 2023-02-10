<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['title', 'description', 'data_inicio', 'data_fim', 'local', 'capacidade', 'banner', 'slug'];

    public function inscrito(){
        return $this->hasMany(Inscrito::class);
    }
}
