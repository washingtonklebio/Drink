<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Refrigerant; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class RefrigerantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refrigerant = Refrigerant::with('flavor', 'type', 'liter')->get();
        return response()->json($refrigerant, 200);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mark = $request->input('mark');
        $liter = $request->input('liter');
        $type = $request->input('type');
        $flavor = $request->input('flavor');
        $quantity = $request->input('quantity');
        $amount = $request->input('amount');
        
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
        
        $refrigerant = new Refrigerant();
        $refrigerant->mark = $mark;
        $refrigerant->liter = $liter;
        $refrigerant->type = $type;
        $refrigerant->flavor = $flavor;
        $refrigerant->quantity = $quantity;
        $refrigerant->amount = $amount;

        if ($refrigerant->save()) {
            return response(['message' => 'Refrigerante cadastrado com sucesso'], 200);
        } 

        return response()->json(['message' => 'Ocorreu um erro ao adicionar refrigerante'], 500);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
