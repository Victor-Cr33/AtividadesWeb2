<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public $veterinarios = [[
        "crmv" => 1321,
        "nome" => "Vete Rinario",
        "especialidade" => "patologia"
    ]];

    public function __construct() {
        $aux = session('veterinarios');

        if(!isset($aux)) {
            session(['veterinarios' => $this->veterinarios]);
        }
    }

    public function index()
    {
        $dados = session('veterinarios');
        $clinica = "VetClin DWII";

        // Passa um array "dados" com os "veterinarios" e a string "clínicas"
        return view('veterinarios.index', compact(['dados', 'clinica']));
        // return view('cliente.index')->with('dados', $dados)->with('clinica', $clinica);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veterinarios.create');
    }


    public function store(Request $request)
    {
        $aux = session('veterinarios');
        
        $novo = [
            "crmv" => $request->crmv,
            "nome" => $request->nome,
            "especialidade" => $request->especialidade
        ];

        array_push($aux, $novo);
        session(['veterinarios' => $aux]);

        return redirect()->route('veterinarios.index');
    }

    public function show($crmv)
    {
        $aux = session('veterinarios');
        
        $index = array_search($crmv, array_column($aux, 'crmv'));

        $dados = $aux[$index];

        return view('veterinarios.show', compact('dados'));
    }

    public function edit($crmv)
    {
      
        $aux = session('veterinarios');
            
        $index = array_search($crmv, array_column($aux, 'crmv'));

        $dados = $aux[$index];    

        return view('veterinarios.edit', compact('dados'));      
    }

    public function update(Request $request, $crmv)
    {
         
        $aux = session('veterinarios');
        
        $index = array_search($crmv, array_column($aux, 'crmv'));

        $novo = [
            "crmv" => $crmv,
            "nome" => $request->nome,
            "especialidade" => $request->especialidade,
        ];

        $aux[$index] = $novo;
        session(['veterinarios' => $aux]);

        return redirect()->route('veterinarios.index');
    }


    public function destroy($crmv)
    {
        $aux = session('veterinarios');
        
        $index = array_search($crmv, array_column($aux, 'crmv')); 

        unset($aux[$index]);

        session(['veterinarios' => $aux]);

        return redirect()->route('veterinarios.index');
    }
}
