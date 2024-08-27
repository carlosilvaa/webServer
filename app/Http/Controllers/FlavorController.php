<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flavor;
use Exception;
use Illuminate\Http\Request;

class FlavorController extends Controller
{

    public function index()
    {
        return Flavor::all();
    }

    public function show($id)
    {
        if (Flavor::find($id) != null) {

            return Flavor::find($id);
        } else {
            return response("ID não encontrado", 400)
                ->header('Content-Type', 'application/json');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'flavor' => 'required',
                'info' => 'required',
                'type' => 'required',
                'price' => 'required',
                'image' => 'required',
            ]);

            $flavor = new Flavor();
            $flavor->flavor = $request->input('flavor');
            $flavor->type = $request->input('type');
            $flavor->info = $request->input('info');
            $flavor->price = $request->input('price');
            $flavor->image = $request->input('image');

            $flavor->save();

            return response("Sabor {$request->input('flavor')} cadastrado com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }

    public function destroy($id)
    {
        try {

            if (Flavor::find($id) != null) {
                $f = Flavor::find($id);
            } else {
                return response("ID não encontrado", 400)
                    ->header('Content-Type', 'application/json');
            }


            Flavor::destroy($id);

            return response("Sabor {$f->flavor} removido com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }

    public function update(Request $request, $id)
    {
        if (Flavor::find($id) != null) {

            $f = Flavor::find($id);
        } else {
            return response("ID não encontrado", 400)
                ->header('Content-Type', 'application/json');
        }

        try {

            $f->update($request->all());

            return response("Sabor {$f->flavor} atualizado com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }
}
