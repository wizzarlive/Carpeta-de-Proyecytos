<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = "proyectos";
    protected $fillable = [
        "title",
        "description",
        "thumbnail",
        "route_proyect",
        "route_github",
        "route_pdf",
        "category_id"
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'category_id');
    }
}
