<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;


class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all();
        $partidos_total = Partido::all()->count();
        $partidos_centro = Partido::all()->where('espectro_politico', 'Centro')->count();
        $partidos_centro_esquerda = Partido::all()->where('espectro_politico', 'Centro-Esquerda')->count();
        $partidos_esquerda = Partido::all()->where('espectro_politico', 'Esquerda')->count();
        $partidos_centro_direita = Partido::all()->where('espectro_politico', 'Centro-Direita')->count();
        $partidos_direita = Partido::all()->where('espectro_politico', 'Direita')->count();

        $dados = [
          'partidos' => $partidos,
          'partidos_total' => $partidos_total,
          'partidos_centro' => $partidos_centro,
          'partidos_centro_esquerda' => $partidos_centro_esquerda,
          'partidos_esquerda' => $partidos_esquerda,
          'partidos_centro_direita' => $partidos_centro_direita,
          'partidos_direita' => $partidos_direita,
        ];
        return view('partidos', $dados);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partido = Partido::find($id);
        $dados = [
          'partido' => $partido
        ];

        return view('partido', $dados);
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
