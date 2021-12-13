<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\Models\Producto;

class ProductosController extends Controller
{
    private $model;

    function __construct(){
        $this->model = new Model();
    }

    public function index()
    {
        $productos = $this->model->getProductos();
        return view('productos/indexProductos', compact('productos'));
    }

    public function searchProductos(Request $request)
    {
        $productos = $this->model->getProductosFilter($request->search);
        return view('productos/indexProductos', compact('productos'));
    }
}
