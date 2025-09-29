<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = "categorias";
    protected $fillable = [
        "name"
    ];

    public function proyectos() {
        return $this->hasMany(Categoria::class);
    }
}
