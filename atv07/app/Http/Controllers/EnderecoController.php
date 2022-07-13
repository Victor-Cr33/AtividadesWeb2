<?php

namespace App\Http\Controllers;
use App\Models\Endereco;

use Illuminate\Http\Request;

class EnderecoController extends Controller {
    
    public function index() {

        $dados = Endereco::all();
        return view('enderecos.index', compact('dados'));
    }

    public function create() {
        return view('enderecos.create');
    }

    public function store(Request $request) {
        
        $regras = [
            'rua' => 'required|max:100|min:10',
            'numero' => 'required|max:7|min:1',
            'cep' => 'required|max:12|min:9|unique:enderecos'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];
 
        $request->validate($regras, $msgs);
        
        Endereco::create([
            'rua' => mb_strtoupper($request->rua, 'UTF-8'),
            'numero' => $request->numero,
            'cep' => $request->cep,
        ]);
        
        return redirect()->route('enderecos.index');
    }

    public function show($id) { }

    public function edit($id) {
        
        $dados = Endereco::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('enderecos.edit', compact('dados'));    
    }

    public function update(Request $request, $id) {
     
        $obj = Endereco::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'rua' => mb_strtoupper($request->rua, 'UTF-8'),
            'numero' => $request->numero,
            'cep' => $request->cep,
        ]);

        $obj->save();

        return redirect()->route('enderecos.index');
    }

    public function destroy($id) {
        
        $obj = Endereco::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('enderecos.index');
    }
}
