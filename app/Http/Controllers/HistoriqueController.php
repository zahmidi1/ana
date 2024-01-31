<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use Illuminate\Support\Facades\DB;

class HistoriqueController extends Controller
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

        return view('historique')->with([
            "historique" =>  invoice::all(),

        ]);
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

        $html = '';
        $totalp = 0;
        $totalq = 0;
        $num = 0;

        $data = invoice::whereBetween('created_at', [$request->date_d, $request->date_f])
            //     // ->join('clients', 'invoices.id_client', '=', 'clients.id')
            //     ->join('clients', 'invoices.id_client', '=', 'clients.id')




            // ->join('clients', 'invoices.id_client', '=', 'clients.id')
            // ->select('invoices.*', 'invoices.id', 'clients.nameCLI', 'clients.cin', 'clients.adress', 'clients.telefone')

            // ->raw("SUM(total) as totalT")
            //     ->select(DB::raw("SUM(qantiter) as qantiterT"))
            // ->groupBy(DB::raw("(id_client)"))
            // ->whereBetween('created_at', [$request->date_d, $request->date_f])
            // ->get();
            // $data = invoice::leftJoin('clients', function ($join) {
            //     $join->on('clients.id', '=', 'invoices.id_client');
            // })
            //     // ->whereBetween('created_at', [$request->date_d, $request->date_f])
            //     ->first([
            //         'clients.nameCLI',
            //     ])
            ->get();


        foreach ($data as $laitR) {
            $totalp +=  $laitR->total;
            $totalq +=  $laitR->qantiter;
            $num +=   1;
            $html .= '<tr class="btn-reveal-trigger">
                        <td "><span>' . $num . '</span></td>

                <td>
                  <a href="/client/historique/invoive/afficher/' . $laitR->id . '/' . $laitR->id_client . '/' . $laitR->date_payment . '"target="_blank">
                     <span class="font-w500">#00' . $laitR->id . '</span>
                 </a>
                </td>
                 
                        <td "><span>' . $laitR->id_client . '</span></td>
                        <td "><span>' . $laitR->prix . '</span></td>
                       
                        <td "><span>' . $laitR->qantiter . '</span></td>
                        <td "><span>' . $laitR->total . '</span></td>
                        <td "><span>' . $laitR->date_payment . '</span></td>
                        <td "><span>' . $totalp . '</span></td>
                        <td "><span>' . $totalq . '</span></td>
                         <td "><a href="/historique/destroy/' . $laitR->id . '">suprimer</a></td>
                    </tr>';
        }

        // $html = '<tr class="btn-reveal-trigger">
        //                     <td "><span>yoow yow</span></td> 
        //                     <td "><span>test</span></td>
        //               </tr>';


        return response()->json(['html' => $html]);
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