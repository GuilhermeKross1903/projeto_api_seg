<?php

namespace App\Http\Controllers;

use App\Responses\ApiResponse;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function salvar()
    {

    }

    
    public function listar()
    {
        return ApiResponse::success(data:["nome" => "Guilherme"]);
    }
    
    public function editar(int $id)
    {

    }

    public function excluir (int $id)
    {

    }
}
