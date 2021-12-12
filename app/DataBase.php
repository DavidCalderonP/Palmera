<?php

namespace App;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\Predio;
use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Http;

class DataBase
{
    function getPredios()
    {
        return Predio::paginate(5);
    }

    function getPredio($id)
    {
        try {
            $query = Predio::findOrFail($id);
        } catch (\Throwable $e) {
            return null;
        }
        return $query;
    }

    function savePredio($predio)
    {
        DB::beginTransaction();
        try {
            $newKey = DB::select("CALL gk_getKey(@id)");
            $predio->setId($newKey[0]->id);
            dd($predio);
            $predio->save();
            DB::select("CALL ak_addKey('{$newKey[0]->id}')");
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return false;
        }
        return true;
    }

    function updatePredio($newPredio){
        try {
            $newPredio::where('id', $newPredio->getId())
            ->update([
                'metros_cuadrados' => $newPredio->getMetrosCuadrados(),
                'numero_palmeras' => $newPredio->getNumeroDePalmeras(),
                'tipo_de_suelo' => $newPredio->getTipoDeSuelo(),
                'ph' => $newPredio->getPh(),
                'salinidad' => $newPredio->getSalinidad(),
                'tipo_de_predio' => $newPredio->getTipoDePredio(),
                'descripcion' => $newPredio->getDescripcion(),
                'fecha_creacion' => $newPredio->getFechaCreacion(),
                'latitud' => $newPredio->getLatitud(),
                'longitud' => $newPredio->getLongitud(),
                'estatus' => $newPredio->getEstatus()
            ]);
        }catch(QueryException $e){
            return false;
        }
        return true;
    }

    function deletePredio($id){
        try {
            $a = Predio::where('id', $id)->update(['estatus' => 0]);
            Predio::where('id', $id)->delete();
        } catch (\Throwable $e) {
            return null;
        }
        return $a;
    }

    public function validarPredio($request)
    {
        return Http::post('http://localhost:4000/api/predioValidacion', $request)->json();
    }

    function getProductos()
    {
        return Producto::paginate(10);
    }

    function getCarrito($userID)
    {
        
        return Carrito::where('id_cliente', $userID)
        ->join('VariedadDeDatil', 'id_variedad', '=', 'VariedadDeDatil.idVariedad')
        ->get();
    }

    function agregarCarrito($request) {
        try {
            $carrito = new Carrito();
            $carrito->cantidad = (int) $request->cantidad;
            $carrito->id_variedad = (int) $request->Id;
            $carrito->id_cliente = (int) $request->userID;
            $carrito->save();
        } catch (\Throwable $e) {
            return null;
        }
        return;
    }

    function deleteCarrito($id) {
        try {
            $a = Carrito::where('id', (int)$id)->delete();
        } catch (\Throwable $e) {
            return null;
        }
        return $a;
    }
}
