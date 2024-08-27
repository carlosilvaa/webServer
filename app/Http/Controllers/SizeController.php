<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Exception;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Size::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'size' => 'required',
                'price' => 'required',
                'info' => 'required',
            ]);

            Size::create($request->all());

            return response("Tamanho {$request->input('size')} cadastrado com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Size::find($id) != null) {
            return Size::find($id);
        } else {
            return response("ID não encontrado", 400)
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Size::find($id) != null) {

            $size = Size::find($id);
        } else {
            return response("ID não encontrado", 400)
                ->header('Content-Type', 'application/json');
        }

        try {

            $size->update($request->all());

            return response("Tamanho {$size->size} atualizado com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            if (Size::find($id) != null) {
                $size = Size::find($id);
            } else {
                return response("ID não encontrado", 400)
                    ->header('Content-Type', 'application/json');
            }

            Size::destroy($size->id);

            return response("Tamanho {$size->dough} removido com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }
}
