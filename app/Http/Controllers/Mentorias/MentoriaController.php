<?php

namespace App\Http\Controllers\Mentorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentoria;
use Carbon\Carbon;

class MentoriaController extends Controller
{
    

    public function getClientesConDiasRestantes()
    {
        $estudiantes = Estudiantes::all();
    
        foreach ($estudiante as $estudiante) {
            $estudiante->dias_30 = Carbon::parse($estudiante->created_at)->diffInDays(now(), false) - 30;
            $estudiante->dias_90 = Carbon::parse($estudiante->created_at)->diffInDays(now(), false) - 90;
            $estudiante->dias_365 = Carbon::parse($estudiante->created_at)->diffInDays(now(), false) - 365;
        }
    
        return response()->json($estudiantes);
    }
}