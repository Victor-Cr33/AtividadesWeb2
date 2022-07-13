<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller {
    
    
    public $clientes = [[
        "id" => 1,
        "nome" => "Gil Eduardo",
        "email" => "gil@gmail.com",
    ]];

    public function __construct() {
        $aux = session('clientes');

        if(!isset($aux)) {
            session(['clientes' => $this->clientes]);
        }
    }
    
    public function index() {
        
        $dados = Cliente::all();
        return view('clientes.index', compact('dados'));
    }

    public function create() {

        return view('clientes.create');
    }

   public function store(Request $request) {
        
    $regras = [
        'nome' => 'required|max:100|min:10',
        'email' => 'required|max:150|min:15',
       
    ];

    $msgs = [
        "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
        "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        "unique" => "Já existe um nome cadastrado com esse [:attribute]!"
    ];

    $request->validate($regras, $msgs);

    Cliente::create([
        'nome' => $request->nome,
        'email' => $request->email,
    ]);
    
    return redirect()->route('clientes.index');
    }

    public function show($id) {
        
        $dados = Cliente::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('clientes.edit', compact('dados')); 
    }

    public function edit($id) {

        $dados = Cliente::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('clientes.edit', compact('dados'));     
    }

    public function update(Request $request, $id) {
        
        $obj = Cliente::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        $obj->save();

        return redirect()->route('clientes.index');
    }

    public function destroy($id) {
           
        $obj = Cliente::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('clientes.index');
    }
}
