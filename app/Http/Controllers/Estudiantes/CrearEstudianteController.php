<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CrearEstudianteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $inputs = $request->all();

        
        if ($request->hasFile('image')) {
        
            $image = $request->file('image');

           
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            
            Storage::disk('public')->put($imageName, file_get_contents($image));


            $inputs['image'] = $imageName;
        }

       
        $estudiante = Estudiante::create($inputs);

      
        return response()->json([
            'data' => $estudiante,
            'mensaje' => 'Estudiante creado exitosamente',
        ]);
        
    
        
    }

}
