<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Ingredient::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param IngredientRequest $ingredientRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(IngredientRequest $ingredientRequest)
    {
        $ingredient = new Ingredient;
        $ingredient->create($ingredientRequest->input());
        return response()->json([
            'res' => 'Ingrediente guardado correctamente'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ingredient::find($id) ?: [];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientRequest $ingredientRequest, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->fill($ingredientRequest->all())->save();
        return response()->json([
            'res' => 'Ingrediente actualizado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::destroy($id);
        return response()->json([
            'res' => 'Ingrediente eliminado'
        ]);
    }
}
