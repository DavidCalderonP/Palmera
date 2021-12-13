<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    private $model;

    function __construct() {
        $this->model = new Model();
    }

    public function index()
    {
        $user = Auth::user('id');
        if($user) {
            $res = $this->model->getCarrito($user->id);
            $importe = $this->model->getImporte($res);
            return view('carrito/indexCarrito', compact('res', 'importe'));
        }
        return view('carrito/indexCarrito');
    }

    public function store(Request $request)
    {
        $res = $this->model->agregarCarrito($request);
        return redirect('productos');
    }

    public function destroy($id)
    {
        $res = $this->model->deleteCarrito($id);
        redirect('carrito');
    }
}
