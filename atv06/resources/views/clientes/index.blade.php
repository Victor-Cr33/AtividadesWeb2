<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Clientes", 'rota' => "clientes.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Clientes @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist 
                :title="'Clientes'"
                :crud="'clientes'"
                :header="['ID', 'NOME', 'EMAIL', 'AÇÕES']" 
                :fields="['id', 'nome', 'email']"
                :data="$dados"
                :hide="[true, false, true, false]" 
                :info="['id', 'nome', 'email']"
                :remove="'nome'"
            />

        </div>
    </div>
@endsection