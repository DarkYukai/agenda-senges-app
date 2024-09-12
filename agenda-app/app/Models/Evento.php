<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    //listar os campos que o model vai trabalhar
    //serve tambem para criacao em massa de dados
    protected $fillable = ['data','discricao','inicio','final','contato','realizado'];
}
