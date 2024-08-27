<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;
use Exception;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sauce::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'price' => 'required',
                'sauce' => 'required',
            ]);

            Sauce::create($request->all());

            return response("Molho {$request->input('sauce')} cadastrada com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Sauce::find($id) != null) {
            return Sauce::find($id);
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

        if (Sauce::find($id) != null) {

            $sauce = Sauce::find($id);
        } else {
            return response("ID não encontrado", 400)
                ->header('Content-Type', 'application/json');
        }

        try {

            $sauce->update($request->all());

            return response("Molho {$sauce->sauce} atualizada com sucesso", 200)
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

            if (Sauce::find($id) != null) {
                $sauce = Sauce::find($id);
            } else {
                return response("ID não encontrado", 400)
                    ->header('Content-Type', 'application/json');
            }

            Sauce::destroy($sauce->id);

            return response("Molho {$sauce->sauce} removida com sucesso", 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 400)
                ->header('Content-Type', 'application/json');
        }
    }
}
