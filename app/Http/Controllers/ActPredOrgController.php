<?php

namespace App\Http\Controllers;

use App\Models\Palmera;
use App\Models\Predio;
use Illuminate\Http\Request;

class ActPredOrgController extends Controller
{
    public function index()
    {
        return $this->create();
    }
    public function create()
    {
        return view('ActPalOrgPredOrg.assingActivity');
    }
    public function store(Request $request)
    {
        foreach (Predio::find('P001')->palmeras as $item){
            var_dump($item->getId());
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
