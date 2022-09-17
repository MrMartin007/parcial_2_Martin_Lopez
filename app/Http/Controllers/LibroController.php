<?php

namespace App\Http\Controllers;

use App\Models\libro;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LibroController extends Controller
{
    public function getAll(){
        $libro=libro::all();
        return $libro;
    }

    public function deleteLibro($id){
        $libro= $this->getLibro($id);
        $libro->delete();
        return $libro;
    }

    public function getLibro($id){
        $libro=libro::find($id);
        return $libro;
    }

    public function editLibroo($id, Request $request){
        $libro = $this->getLibro($id);
        $libro->fill($request->all())->save();
        return $libro;
    }

 public function listaLibro(){
     $libro = DB::table('libros')
         ->select('libros.*')
         ->paginate(10);

    return view('listaLibro',compact('libro'));
}

    public function formLibro(){
    return view('crearLibro');
}

    public function saveLibro(Request $request){
        if($request->control=='form' || $request->control=='api') {
    try{
        $validar=$this->validate($request,[
            'nombre'=>'required',
            'fecha'=>'required',
            'nombre_autor'=>'required',
            'serie'=>'required',
            'editorial'=>'required',


        ]);
        libro::create([
            'nombre'=>$validar['nombre'],
            'fecha'=>$validar['fecha'],
            'nombre_autor'=>$validar['nombre_autor'],
            'serie'=>$validar['serie'],
            'editorial'=>$validar['editorial'],
        ]);
    }catch (QueryException $queryException){
        Log::debug($queryException->getMessage());
        return redirect('/formLibro')->with('alertaQery', 'no');
    } catch (\Exception $exception){

        Log::debug($exception->getMessage());

        return redirect('/formLibro')->with('alerta', 'si');
    }
            if($request->control=='form'){
                return redirect('/')->with('Guardado', 'Guardado');
            }elseif($request->control=='api'){
                return response()->json([
                    'codigo' => '1',
                    'descripcion' => 'Guardado Exitosamente',
                ]);
            }

        }
}


    public function editformLibro($id){
        $libro=libro::findOrFail($id);

        return view('editLibro', compact('libro'));
    }
    public function editLibro(Request $request, $id ){
        $libro=request()->except((['_token','_method']));
        libro::where('id','=', $id)->update($libro);
        return redirect('/')->with('Modificado', 'Modificado');
    }

    public function destroy($id){
        try {
            libro::destroy($id);
            return redirect('/')->with('Eliminado', 'Eliminado');
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return redirect('/')->with('alerta','si');
        }
    }

}

