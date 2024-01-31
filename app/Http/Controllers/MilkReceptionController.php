<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storemilk_receptionRequest;
use App\Http\Requests\Updatemilk_receptionRequest;
use App\Models\Clients;
use App\Models\milk_reception;
use Illuminate\Http\Request;
use Illuminate\Queue\Console\RetryCommand;
use Illuminate\Support\Facades\DB;

class MilkReceptionController extends Controller
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
    public function rest()
    {
        $rows = Clients::where('statusJour', '=', '1')->get();
        foreach ($rows as $row) {
            $row->statusJour = 0;
            $row->save();
        }
        return response()->json(['data' => "ok ::!"]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = DB::table('clients')
            ->whereIn('status', [1])
            ->get();


        return view('laitT')->with([

            "clients" =>  $client,
            // "milk_reception" => milk_reception::where('date_payment', null)
            //     ->orderBy('created_at', 'DESC')
            //     ->limit(30)
            //     ->get()



        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lait(Request $request)
    {

        // abort_unless(\Gate::allows('city_access'), 401);

        if (!$request->date_t) {
            $html =
                '<tr class="btn-reveal-trigger">
            <td class="py-2 "> noot data </td>
                    </tr>';;
        } else {
            $html = '';
            $totalL = 0;
            $num =  0;
            $data =  milk_reception::whereDate('created_at', $request->date_t)->get();

            foreach ($data as $laitR) {
                $totalL +=  $laitR->quantity;
                $num +=  1;
                $html .= '<tr class="btn-reveal-trigger">
                <td  ">' . $num . '</td> 
                <td  ">' . $laitR->created_at . '</td> 
                        
                        <td "><span>' . $laitR->period . '</span></td>
                        
                        <td ><span>00' . $laitR->id_client . '</span></td>
                        <td "><span>' . $laitR->quantity . '<span>L</span></span></td>
                        <td  "><span>' . $totalL . '<span>L</span></span></td>
                         <td  "><a type="button" class="btn btn-danger" href="/milk_reception/delete/' . $laitR->id . '" >Suprimer</a></td>
                    </tr>';
            }
        }
        return response()->json(['html' => $html]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('milk_reception')->with([

            "milk_reception" => milk_reception::all()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storemilk_receptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemilk_receptionRequest $request)
    {
        $request->validated([
            'id_client' => 'required',
            'period' => 'required',
            'quantity' => 'required|min:1|max:3',
            'T' => 'required',
            'density' => 'required|max:50|min:1',
            'heat' => 'required|max:40'




        ]);


        $milk_reception = new milk_reception();
        $milk_reception->id_user = $request->input('id_user');
        $milk_reception->id_client = $request->input('id_client');
        $milk_reception->period = $request->input('period');
        $milk_reception->quantity = $request->input('quantity');
        $milk_reception->density = $request->input('density');
        $milk_reception->heat = $request->input('heat');
        $milk_reception->date_payment =  NULL;
        $milk_reception->T = $request->input('T');
        $milk_reception->save();
        $re = Clients::find($request->input('id_client'));
        $re->update(['statusJour' => '1']);
        $re->push();

        return redirect('/milk_reception')->with('status', 'le lait bin ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\milk_reception  $milk_reception
     * @return \Illuminate\Http\Response
     */
    public function show(milk_reception $id)
    {
        // return DB::table('milk_receptions')->where('id_client', $id);
        // DB::Table('milk_receptions')->where('id', $id)->get();

        // DB::Table('milk_receptions')->get();
        // return milk_reception::where('id_clinet', "=", $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\milk_reception  $milk_reception
     * @return \Illuminate\Http\Response
     */
    public function edit(milk_reception $milk_reception)
    {
        // return view('milk_reception')->with([

        //     "milk_reception" => milk_reception::all()

        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemilk_receptionRequest  $request
     * @param  \App\Models\milk_reception  $milk_reception
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemilk_receptionRequest $request, milk_reception $milk_reception)
    {
        // $data = DB::table('milk_receptions')

        $data =  milk_reception::all()->where('id_client', $request->input('id_client'))
            ->orderBy('created_at', 'ASC')
            ->whereBetween('milk_receptions.created_at', [$request->input('debu'), $request->input('fin')])
            ->get();

        foreach ($request as $gg) {
            // $gg->update(['created_at' => $request->input('date_payment')]);
            $gg->created_at = $request->input('date_payment');
            $gg->push();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\milk_reception  $milk_reception
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $milk_reception=milk_reception::find($id);
        $milk_reception->delete(); 
        //returns true/false
        return redirect('/milk_reception')->with('status', 'le lait bin suprimer');
    }
}