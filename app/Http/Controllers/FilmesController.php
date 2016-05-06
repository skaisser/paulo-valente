<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Filme;
use App\Http\Requests;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmes = Filme::paginate(10);
        return view('filmes', compact('filmes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('novoFilme', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'sinopse' => 'required',
            'categoria' => 'required'
            ]);

        // Criando Filme Manualmente
        
        // $filme = new Filme;
        // $filme->titulo = $request->titulo;
        // $filme->sinopse = $request->sinopse;
        // $filme->save();
        // 
        
        // Criar Automaticamente MASS Assignment
        $filme = Filme::create($request->input());

        // Relacionando o Filme com uma ou varias categorias
        foreach($request->categoria as $categoria){
            $filme->categorias()->attach($categoria);
        }

        //  foreach($request->category as $cat){
        //     $artigo->categories()->attach($cat);
        // }
        // 

        return redirect()->route('filme.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $filme = Filme::findBySlug($slug);
        return view('filme', compact('filme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Filme $filme)
    {
        $categorias = Categoria::all();
        return view('editarFilme', compact('filme', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filme $filme)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'sinopse' => 'required',
            'categoria' => 'required'
            ]);

        // Atualizacao Automatica
        $filme->fill($request->input());
        // $filme->publicar = 0;
        $filme->save();
        
        // Atualizando Relacionamento Many to Many
        $filme->categorias()->detach();

        foreach($request->categoria as $categoria){
            $filme->categorias()->attach($categoria);
        }
        // // Atualizacao Manual
        // $filme->titulo = $request->titulo;
        // $filme->save();
        // 
        // 
        return redirect()->route('filme.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filme $filme)
    {
        $filme->delete();
        return redirect()->route('filme.index');
    }
}
