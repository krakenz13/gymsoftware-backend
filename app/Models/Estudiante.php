<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table ="estudiantes";
    
    public function index()
    {
        $estudiantes = Estudiante::all();

        return view('estudiantes.index', compact('estudiantes'));
    }
    
    
    protected $fillable = [
        'nombre',
        'apellido',
        'foto',
        'cedula',
        'telefono' 
    ];

    public function cursos(){
        return $this->belongsToMany(Curso::class,"curso_estudiante");
    }

    public function mentorias(){
        return $this->belongsToMany(Mentoria::class,"estudiantes_mentorias");
    }

}
