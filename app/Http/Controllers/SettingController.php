<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $afterInsert = session('afterInsert', 'show juegos');
        $checkedList = '';
        $checkedCreate = '';
        if($afterInsert == 'show juegos') {
            $checkedList = 'checked';
        } else {
            $checkedCreate = 'checked';
        };
        
        // Select
        $afterEdit = session('afterEdit', 'juego');
        $afterEditOptions = [
            'juego' => 'Show all juegos list',
            'edit' => 'Show edit juego form',
            'show' => 'Show juego'
        ];
    
        
    return view('setting.index', ['checkedList' => $checkedList, 
                                  'checkedCreate' => $checkedCreate, 
                                  'afterEditOptions' => $afterEditOptions,
                                  'selectedEditOption' => $afterEdit]);
    }
    
    public function update(Request $request)
    {
        session(['afterInsert' => $request->afterInsert, 
                 'afterEdit' => $request->afterEdit]);
        return back()->with(['message' => 'Setting has been updated']);
    }
}