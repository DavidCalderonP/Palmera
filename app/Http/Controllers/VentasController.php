<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model;

class VentasController extends Controller
{
    
    private $model;

    function __construct() {
        $this->model = new Model();
    }

    public function index()
    {
        $user = Auth::user('id');
        $res = $this->model->getCarrito($user->id);
        $importe = $this->model->getImporte($res);
        return view('compra/detalleCompra',compact('res', 'importe'));
    }
    
    public function registrarVenta(Request $request) {
        $venta = $this->model->crearVenta();
        $venta = $this->model->guardarCliente($venta, $request->userID);
        $venta = $this->model->registrarFechaVenta($venta);
        $venta = $this->model->registrarLineaVenta($request->userID);
        //$venta = $this->model->registrarVenta();
        dd($venta);
    }

    public function validaTDC(Request $request) {
        $request->validate([
            'nombreTitular' => ['required'],
            'numeroTarjeta' => ['required'],
            'mes' => ['required'],
            'año' => ['required'],
            'cve' => ['required']    
        ]);
        $res = $this->model->validaTDC($request);
        if($res) $this->model->registrarPago($request);
    }
}
