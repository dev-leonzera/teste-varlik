<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $evento = new Evento();
        $evento->title = $request->input('title');
        $evento->local = $request->input('local');
        $evento->data_inicio = $request->input('data_inicio');
        $evento->data_fim = $request->input('data_fim');
        $evento->description = $request->input('description');
        $evento->capacidade = $request->input('capacidade');
        $evento->slug = Str::slug($request->input('title'));
        $evento->banner = 'banner'.'_'.$evento->slug.'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('/img'), $evento->banner);
        $evento->save();

        return redirect()->route('eventos.index')
            ->with('success', 'Evento criado com sucesso!');
    }


    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        $inscritos = $evento->inscrito()->orderBy('nome')->get();
        return view('eventos.show')->with('evento', $evento)->with('inscritos', $inscritos);
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

        $evento->title = $request->input('title');
        $evento->local = $request->input('local');
        $evento->data_inicio = $request->input('data_inicio');
        $evento->data_fim = $request->input('data_fim');
        $evento->description = $request->input('description');
        $evento->capacidade = $request->input('capacidade');
        $evento->slug = Str::slug($request->input('title'));
        if($request->file('image')){
            $evento->banner = 'banner'.'_'.$evento->slug.'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('/img'), $evento->banner);
        }

        $evento->update();

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
