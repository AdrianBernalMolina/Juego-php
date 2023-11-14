<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::all(); //eloquent
        //dd($juegos;);
        return view('juego.index', ['juegos' => $juegos]);
    }

    public function create()
    {
        return view('juego.create');
    }

    public function store(Request $request)
    {
        $object = new Juego($request->all());
        
        try {
            $result = $object->save();
            
            $afterInsert = session('afterInsert', 'show juegos');
            $target = 'juego';
            if($afterInsert != 'show juegos') {
                $target = 'juego/create';
            }
            
            return redirect('juego/create')->with(['message' => 'The game has been saves']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The game has not been saved']); // si no guarda volver a la pagina anterior con los datos
        }
    }

    public function show(Juego $juego)
    {
        return view('juego.show', ['juego' => $juego]);
    }

    public function edit(Juego $juego)
    {
        return view('juego.edit', ['juego' => $juego]);
    }

    public function update(Request $request, Juego $juego)
    {
        try { 
            $result = $juego->update($request->all());
            $afterEdit = session('afterEdit', 'juego');
            if ($afterEdit == 'juegos') {
                $target = 'juego';
            } else if ($afterEdit == 'edit') {
                $target = 'juego/' . $juego->id . '/edit';
            } else {
                $target = 'juego/' . $juego->id;
            };
            return redirect('juego')->with(['message' => 'The game has been updated']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The game has not been updated']);
        }
    }

    public function destroy(Juego $juego)
    {
        try {
            $juego -> delete();
            return redirect('juego')->with(['message' => 'The game has been deleted']);
        } catch(\Exception $e) {
            return back()->withErrors(['message' => 'The game has not been deleted']);
        }
    }
}
