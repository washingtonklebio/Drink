<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Refrigerant; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Services\RefrigerantService;

class RefrigerantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RefrigerantService $service)
    {
        return response()->json($service->index(), 200);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RefrigerantService $service)
    {
        
        $validator = Validator::make($request->all(), [ 
            'mark' => 'required|string', 
            'liter' => 'required', 
            'type' => 'required|int',
            'flavor' => 'required|int',
            'quantity' => 'required|int',
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Dados inválidos, tente novamente'], 400);            
        }
        
        if (!$service->save($request->all())) {
            return response()->json(['message' => 'Ocorreu um erro ao adicionar refrigerante'], 500);  
        }

        return response(['message' => 'Refrigerante cadastrado com sucesso'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, RefrigerantService $service)
    {

        $validator = Validator::make($request->all(), [ 
            'mark' => 'required|string', 
            'liter' => 'required', 
            'type' => 'required|int',
            'flavor' => 'required|int',
            'quantity' => 'required|int',
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Dados inválidos, tente novamente'], 400);            
        }
        
        if (!$service->update($id, $request->all())) {
            return response()->json(['message' => 'Não foi possível atualizar refrigerante,
            verifique se já existe refrigerante com essa marca/litragem já cadastrado'], 500); 
        }

        return response(['message' => 'Refrigerante atualizado com sucesso'], 200);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,  RefrigerantService $service)
    { 
        if (!$service->destroy($id)) {
            return response(['message' => 'Ocorreu um erro ao remover refrigerante'], 200);
        }
        
        return response(['message' => 'Refrigerante removido com sucesso'], 200);
    }

    public function totalRefrigerant(RefrigerantService $service)
    {
        return response($service->totalRefrigerant(), 200);
    }
}
