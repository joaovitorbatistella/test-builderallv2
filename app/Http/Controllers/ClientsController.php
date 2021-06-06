<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\City;
use Inertia\Inertia;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientsList = DB::table('clients')
        ->join('cities', 'cities.id', '=', 'clients.city_id')
        ->select('cities.city_name', 'clients.*')
        ->get();
        return Inertia::render('Clients/Home', [
            'clients' => $clientsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citiesList = City::all();
        return Inertia::render('Clients/Create', [
            'cities' => $citiesList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(
            'name.required' => 'É obrigatório um nome para o cliente',
            'city.required' => 'É obrigatório uma cidade para o cliente',
        );

        $rules = array(
            'name' => 'required|string',
            'city' => 'required',
        );

        $validador = Validator::make($request->all(), $rules, $messages);

        if ($validador->fails()) {
            return redirect('/clients/create')->withInput($request->all);
        }

        Client::create([
            'name' => $request->name,
            'city_id' => (int)$request->city,
        ]);
       
        return Redirect::route('clients.index')->with('success', 'Usuario criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = DB::table('clients')
        ->join('cities', 'cities.id', '=', 'clients.city_id')
        ->select('cities.city_name', 'clients.*')
        ->get();
        $clientOnce = $clients->firstWhere('id', $id);
        return Inertia::render('Clients/Show', [
            'client' => $clientOnce,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = DB::table('clients')
        ->join('cities', 'cities.id', '=', 'clients.city_id')
        ->select('cities.city_name', 'clients.*')
        ->get();
        $clientOnce = $clients->firstWhere('id', $id);
        $citiesList = City::all();
        return Inertia::render('Clients/Edit', [
            'client' => $clientOnce,
            'cities' => $citiesList,
        ]);
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
        $messages = array(
            'name.required' => 'É obrigatório um nome para o cliente',
            'city_id.required' => 'É obrigatório uma cidade para o cliente',
        );

        $rules = array(
            'name' => 'required|string',
            'city_id' => 'required',
        );

        $validador = Validator::make($request->all(), $rules, $messages);

        if ($validador->fails()) {
            return redirect('/clients/create')->withInput($request->all);
        }

        $obj_Client = Client::findOrFail($id);
        $obj_Client->name = $request['name'];
        $obj_Client->city_id = $request['city_id'];
        $obj_Client->save();
       
        return Redirect::route('clients.index')->with('success', 'Cliente alterado com sucesso!');
    }

    public function delete($id)
    {
        $clientList = Client::find($id);
        return Inertia::render('Clients/Delete', [
            'client' => $clientList
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_Client = Client::findOrFail($id);
        
        $obj_Client->delete($id);
        return Redirect::route('clients.index')->with('success', 'Cliente alterado com sucesso!');
    }
}
