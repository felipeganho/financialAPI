<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consultaStock');
    }

    public function consultarAcao(Request $request){
        //caso já tenha no banco
        $dateCompany = DB::table('stocks')->where('ticker', '=', $request->inputStock)->get();
        if(!$dateCompany->isEmpty()){
            $data = json_decode($dateCompany[0]->data);
            $companyName = $data->companyName;
            $latestPrice = $data->latestPrice;            
        }

        else{
            //chamada api e atribuição do nome e última cotação da companhia
            $data = Http::get('https://cloud.iexapis.com/stable/stock/'.$request->inputStock.'/quote?token=pk_a983965329b041c49725639aba4fd562');
            $symbol = $data['symbol'];
            $companyName = $data['companyName'];
            $latestPrice = $data['latestPrice'];

            //armazena json no banco
            $stock = json_decode($data, true); 
            Stock::create(['name' => $companyName, 'ticker' => $symbol, 'data' => $stock]);
        }
        
        return view('stock', compact('companyName', 'latestPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
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
