<?php

namespace App\Http\Controllers;

use App\Models\DocDocumento;
use Illuminate\Http\Request;

class DocDocumentoController extends Controller
{
    public function index()
    {
       return DocDocumento::all();
    }

    public function store(Request $request){

        $inputs = $request->input();
        $respuesta = DocDocumento::create($inputs);
        $respuesta->update(['doc_codigo' => $inputs['doc_codigo']. '-' . $respuesta->doc_id]);
        return $respuesta;
    }

    public function show($id){

        $e = DocDocumento::find($id);
        if ($e) {
            return response()->json([
                'error' => false,
                'mensaje' => 'registro encontrado',
                'data' => $e,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe el registro',
            ]);
        }
    }

    public function update(Request $request, $id){

        $e = DocDocumento::find($id);
        if ($e) {
            $e->doc_nombre = $request->doc_nombre;
            $e->doc_codigo = $request->doc_codigo;
            $e->doc_contenido = $request->doc_contenido;
            $e->doc_id_tipo = $request->doc_id_tipo;
            $e->doc_id_proceso = $request->doc_id_proceso;

            if ($e->save()) {
                return response()->json([
                    'error' => false,
                    'mensaje' => 'Registro actualizado correctamente',
                    'data' => $e,
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => 'Error al actualizar el registro',
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe el registro',
            ]);
        }

    }

    public function destroy($id){

        $e = DocDocumento::find($id);
        if ($e) {
            $delete = DocDocumento::destroy($id);
            if ($delete) {
                return response()->json([
                    'error' => false,
                    'mensaje' => 'Registro eiliminado correctamente',
                    'data' => [],
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => 'Error al eliminar el registro',
                    'data' => $delete,
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe el registro',
            ]);
        }
    }
}