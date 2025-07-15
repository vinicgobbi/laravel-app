<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all(); //atribui todos os valores de $support para $supports
        //dd($supports);//debug

        return view('admin.supports.index', compact('supports')); //retorna a view em admin/supports/index.blade.php e exporta a variavel $supports
    }

    public function show(string|int $id, Support $support) // Função para exibir os dados
    {
        if(!$data = $support->find($id)){ // Valida se a variavel data vai encontrar algum chamado através do id
            return back(); // Retorna para ultimo endereço acessado com sucesso
        }

        return view('admin.supports.show', compact('data')); // retorna a a view do arquivo admin/supports/show exportando a variavel data
    }

    public function create() //Funcao para criar um novo chamado
    {
        return view('admin.supports.create');
    }

    public function store(Request $request, Support $support) // Funcao para armazenar novos dados
    {

    // dd($request->only(["subject", "body"])); //Debug

    $data = $request->all(); // Armazena em data todos os dados da request
    $data['status'] = 'a'; //Adiciona a coluna status, com o valor 'a' para representar aberto

    $support->create($data); //salva os dados no Banco de dados

    return redirect()->route('supports.index'); //Volta para a pagina inicial
    }

    public function edit(Support $support, string|int $id) // Função para editar um chamado
    {
        if(!$data = $support->find($id)){ // Valida se a variavel data vai encontrar algum chamado através do id
            return back(); // Retorna para ultimo endereço acessado com sucesso
        }

        return view('admin.supports.edit', compact('data')); //Retorna a view para editar o formulario
    }

    public function update(Request $request, Support $support, string $id) // Função par atualizar um chamado
    {
        if(!$data = $support->find($id)){ // Valida se a variavel data vai encontrar algum chamado através do id
            return back(); // Retorna para ultimo endereço acessado com sucesso
        }

        $data->update($request->only([
            'subject',
            'body'
        ])); // Atualiza os campos de assunto e corpo do chamado

        return redirect()->route('supports.index'); // redireciona para a tela principal
    }

	public function destroy(string|int $id)
	{
		if(!$data = Support::find($id)){ // Valida se a variavel data vai encontrar algum chamado através do id
            return back(); // Retorna para ultimo endereço acessado com sucesso
        }

		$data->delete(); //Apaga o dado do banco de dados

		return redirect()->route('supports.index');// redireciona para a tela principal
	}
}
