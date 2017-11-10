<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pizzas.index', [
            'pizzas' => Pizza::withTrashed()->where('user_id', auth()->user()->id)->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzas.create', ['pizza' => new Pizza]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:pizzas|max:255',
                'price' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'El nombre de la pizza es requerido',
                'name.unique' => 'Esa pizza ya existe!',
                'price.required' => 'El precio de la pizza es requerido',
                'description.required' => 'La descripción de la pizza es requerida'
            ]
        );
        $request->request->add(['user_id' => auth()->user()->id]);
        Pizza::create($request->input());
        return redirect('pizzas')->with('message', 'Pizza creada...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    public function restore($id)
    {
        // TODO restaurar el estado de una pizza
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
