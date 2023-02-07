<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::paginate();
        return view('eventos.index', compact('eventos'));
    }


    public function store(Request $request)
    {
        $evento = Evento::create($request->input());
        return redirect()->route('eventos.index')
            ->with('success', 'Evento criado com sucesso!');
    }


    public function show($id)
    {
        $evento = Evento::findOrFail($id);

        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $data = $request->input();

        $evento->update($data);

        return redirect()->route('eventos.index')
            ->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        $evento->delete();

        return redirect()->route('eventos.index')
                     ->with('success', 'Evento excluído com sucesso!');
    }
}
