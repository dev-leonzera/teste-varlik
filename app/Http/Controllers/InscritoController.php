<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Inscrito;

class InscritoController extends Controller
{
    public function pageEvento($slug){
        $evento = Evento::where('slug', $slug)->firstOrFail();
        $qnt_inscritos = $evento->inscrito()->count();
        return view('eventos.evento', compact('evento', 'qnt_inscritos'));
    }

    public function pageForm($id){
        $evento = Evento::findOrFail($id);
        return view('eventos.inscricao', compact('evento'));
    }

    public function formInscricao(Request $request){
        $data = $request->input();
        $inscrito = Inscrito::create($data);
        $evento = Evento::findOrFail($data['evento_id']);

        return redirect()->route('evento.page', ['slug' => $evento->slug])->with('success', 'Inscrição realizada com sucesso!');
    }
}
