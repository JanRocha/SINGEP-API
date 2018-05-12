<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class participante extends Model
{
  use SoftDeletes;
  protected $table = "participante";
  protected $fillable = ['adm','email','cpf','telefone','filiacao'];
}
