<?php

namespace App\Models;

use App\Models\User;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table = 'inscripciones';
    protected $fillable = ['curso_id', 'user_id', 'factura', 'equipo', 'metodo_pago'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }

    public function cursos(){
        return $this->hasMany(Curso::class);
    }
}
