<?php

namespace App\Http\Controllers;
use App\Models\Veterinario;
use Illuminate\Http\Request;
use App\Models\Especialidade;

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
       
        $dados = Veterinario::all();
        return view('veterinarios.index', compact('dados'));
    }

    public function create()
    {
        $especialidades = Especialidade::all();
        if(!isset($especialidades)){return"<h1>ID: Não há especilidades cadastradas!</h1>";}
        return view('veterinarios.create', compact('especialidades'));
    }


    public function store(Request $request)
    {

        Veterinario::create([
            'crmv' => $request->crmv,
            'nome' => $request->nome,
            'especialidade_id' => $request->especialidades
        ]);
        
        return redirect()->route('veterinarios.index');
    }

    public function show($id)
    {
        $dados = Veterinario::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('veterinarios.edit', compact('dados')); 
    }

    public function edit($id)
    {
      
        $dados = Veterinario::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('veterinarios.edit', compact('dados')); 
    }

    public function update(Request $request, $id)
    {
         
        $obj = Veterinario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'crmv' => $request->crmv,
            'nome' => $request->nome,
        ]);

        $obj->save();

        return redirect()->route('veterinarios.index');
    }


    public function destroy($id)
    {
        $obj = Veterinario::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('veterinarios.index');
    }
}
