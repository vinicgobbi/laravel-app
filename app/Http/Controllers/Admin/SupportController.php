<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;


class SupportController extends Controller
{

	public function __construct(
		protected SupportService $service
	){}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter); //atribui todos os valores de $support para $supports
       // dd($supports);
        return view('admin.supports.index', compact('supports')); //retorna a view em admin/supports/index.blade.php e exporta a variável $supports
    }

    public function show(string|int $id) // Função para exibir os dados
    {
        if(!$data = $this->service->findOne($id)){ // Valida se a variável data vai encontrar algum chamado através do id
            return back(); // Retorna para ultimo endereço acessado com sucesso
        }

        return view('admin.supports.show', compact('data')); // retorna a a view do arquivo admin/supports/show exportando a variável data
    }

    public function create() //função para criar um novo chamado
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support) // Função para armazenar novos dados
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index'); //Volta para a pagina inicial
    }

    public function edit(string $id) // Função para editar um chamado
    {
        if(!$data = $this->service->findOne($id)){ // Valida se a variável data vai encontrar algum chamado através do id
            return back(); // Retorna para ultimo endereço acessado com sucesso
        }

        return view('admin.supports.edit', compact('data')); //Retorna a view para editar o formulário
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id) // Função par atualizar um chamado
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if (!$support){
            return redirect()->back();
        }

        return redirect()->route('supports.index'); // redireciona para a tela principal
    }

	public function destroy(string $id)
	{
		$this->service->delete($id);

		return redirect()->route('supports.index'); // redireciona para a tela principal
	}
}
