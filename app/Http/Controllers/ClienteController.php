<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Responses\ApiResponse;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');

        }

        $customer = Cliente::create($request->all());
        return ApiResponse::ok('Cliente salvo com sucesso', $customer);
    }

    public function listarPeloId(int $id)
    {
        $customer = Cliente::findOrFail($id);
        return ApiResponse::ok('Cliente a ser listado', $customer);
    }
    
    public function listar()
    {
        $customers = Cliente::all();
        return ApiResponse::ok('Lista de clientes', $customers);
    }
    
    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors(), 'Validation error');

        }

        $customer = Cliente::findOrFail($id);
        $customer->update($request->all());
        return ApiResponse::ok('Cliente atualizado com sucesso', $customer);

    }

    public function excluir (int $id)
    {
        $customer = Cliente::findOrFail($id);
        $customer->delete();
        return ApiResponse::ok('Cliente atualizado com sucesso');
  
    }
}
