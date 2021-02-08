<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAnuncios extends Model
{
    use HasFactory;
    public $table      = 'tb_anuncios';
    public $timestamps = false;
    public $fillable  = ['title', 'description', 'preco', 'images', 'cod_cliente'];
}
