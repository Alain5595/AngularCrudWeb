<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\v1\Empleado; 

class EmpleadoController extends Controller
{
    function getAll(Request $request)
    {
        $search=$request->search;
        $response= new \stdClass();
        $empleado= Empleado::all();
        $response->success=true;
        $response->data = $empleado;
        return response()->json($response,200);
    }

    function getItem($id)
    {
        $response= new \stdClass();
        $empleado= Empleado::find($id);
        $response->success=true;
        $response->data = $empleado;
        return response()->json($response,200);   
    }

    function store(Request $request)
    {
        $response = new \stdClass();
        $empleado = new Empleado();
        
        $empleado->nombre = $request->nombre;
        $empleado->correo = $request->correo;
        
        

        $empleado->save();
        $response->success = true; 
        $response->data = $empleado;
        return response()->json($response,200);   
    }

    function putUpdate(Request $request)
    {
        $response = new \stdClass();
        $empleado = Empleado::find($request->id);

        if($empleado)
        {
            
            $empleado->nombre = $request->nombre;
            $empleado->correo = $request->correo;
           
            
          
            $empleado->save();
            $response->success = true;
            $response->data = $empleado;
        }
        else{
            $response->success = false;
            $response->errors = ["el empleado con el id ".$request->id."no existe"];
        }

        return response()->json($response, ($response->success?200:401));   
    }
    
    function patchUpdate(Request $request)
    {
        $response = new \stdClass();
        $empleado = Empleado::find($request->id);

        if($empleado)
        {
            
            if($request->nombre)
            $empleado->nombre = $request->nombre;
            if($request->correo)
            $empleado->correo = $request->correo;
            
            $empleado->save();
            $response->success = true;
            $response->data = $empleado;
        }
        else{
            $response->success = false;
            $response->errors = ["el empleado con el id ".$request->id." no existe"];
        }

        return response()->json($response, ($response->success?200:401));   
    }
    
    function delete($id)
    {
        $response = new \stdClass();
        $empleado = Empleado::find($id); 
        if($empleado){
            $empleado->delete();
            $response->success = true;

        }
        else{
            $response->success = false;
            $response->errors = ["el empleado con el id ".$id." no existe"];
        }
        return response()->json($response, ($response->success?200:401));

    }
}

