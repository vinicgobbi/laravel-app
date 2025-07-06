<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) //Injeção de dependências
    {
        $supports = $support->all(); //atribui todos os valores de $support para $supports
        //dd($supports);//debug

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id, Support $support)
    {
        if(!$data = $support->find($id)){
            return back();
        }

        return view('admin.supports.show', compact('data'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {

    // dd($request->only(["subject", "body"]));
    $data = $request->all();
    $data['status'] = 'a';

    $support->create($data);

    return redirect()->route('supports.index');
    }
}
