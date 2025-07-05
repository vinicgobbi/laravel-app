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
        dd($supports);//debug

        return view('admin.supports.index');
    }
}
