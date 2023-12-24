<?php

namespace App\Models;

use App\Models\Maestro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = ['nombre', 'nivel', 'duracion', 'precio', 'descripcion', 'imagen', 'maestro_id'];

    public function maestro(){
        return $this->belongsTo(Maestro::class, 'maestro_id', 'id');
    }

    public function maestros(){
        return $this->hasMany(Maestro::class);
    }

}
