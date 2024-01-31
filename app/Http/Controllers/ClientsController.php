<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientsRequest;
use App\Http\Requests\UpdateclientsRequest;
use App\Models\Clients;
use App\Models\milk_reception;
use Illuminate\Support\Facades\DB;

use function Psy\bin;

class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('client')->with([
            "clients" =>  Clients::all(),

        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client')->with([
            "clients" =>  Clients::all(),

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $request = Clients::find($id);
        $request->update(['status' => 0]);
        $request->push();
        return redirect('/client')->with('status', 'active réussie');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function desactive($id)
    {
        $request = Clients::find($id);
        $request->update(['status' => 1]);
        $request->push();
        return redirect('/client')->with('status', 'desactive réussie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreclientsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreclientsRequest $request)
    {

        $request->validated([

            'name' => 'required|min:5|max:25',
            'cin' => 'required|min:3|max:9',
            'adress' => 'required|max:250',
            'telefone' => 'required|max:10'
        ]);

        $client = new Clients();

        $client->nameCLI = $request->input('name');
        $client->cin = $request->input('cin');
        $client->adress = $request->input('adress');
        $client->telefone = $request->input('telefone');
        $client->save();
        return redirect('/client')->with('status', 'insertion réussie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $id)
    {


        return view('milk_reception')->with([
            "milk_receptions" => DB::table('milk_receptions')
                ->where('id_client', $id->id)
                ->where('date_payment', NULL)
                ->join('clients', 'milk_receptions.id_client', '=', 'clients.id')
                ->join('users', 'milk_receptions.id_user', '=', 'users.id')
                ->select('milk_receptions.*', 'clients.nameCLI', 'clients.id', 'clients.cin', 'clients.adress', 'clients.telefone', 'users.name')
                ->get()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $id)
    {
        $client =  Clients::find($id);
        return view('client')->with([
            "clients" =>  $client

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclientsRequest  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclientsRequest $request, clients $id)
    {
        $client =  Clients::find($id);

        $client->nameCLI = $request->input('name');
        $client->cin = $request->input('cin');
        $client->adress = $request->input('adress');
        $client->telefone = $request->input('telefone');
        $client->save();
        return redirect('/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $id)
    {
        $client =  Clients::find($id);
        $client->delete();
        return redirect('/client');
    }
}