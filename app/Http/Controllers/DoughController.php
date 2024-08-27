<?php

namespace App\Http\Controllers;

use App\Models\Dough;
use Exception;
use Illuminate\Http\Request;

class DoughController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dough::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'price' => 'required',
                'info' => 'required',
                'dough' => 'required'
            ]);

            Dough::create($request->all());

            return response("Massa {$request->input('dough')} cadastrada com sucesso", 200)
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
        if (Dough::find($id) != null) {
            return Dough::find($id);
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
        if (Dough::find($id) != null) {

            $dough = Dough::find($id);
        } else {
            return response("ID não encontrado", 400)
                ->header('Content-Type', 'application/json');
        }

        try {

            $dough->update($request->all());

            return response("Massa {$dough->dough} atualizada com sucesso", 200)
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

            if (Dough::find($id) != null) {
                $dough = Dough::find($id);
            } else {
                return response("ID não encontrado", 400)
                    ->header('Content-Type', 'application/json');
            }

            Dough::destroy($dough->id);

            return response("Massa {$dough->dough} removida com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }
}
